import pandas as pd
import numpy as np
from matplotlib import pyplot as plt
import matplotlib 
matplotlib.rcParams["figure.figsize"] = (20,10)

dataset = pd.read_csv("bengaluru_house_prices.csv")
dataset.head()

cl_dataset = dataset.drop(['area_type','society','balcony','availability'],axis='columns')
cl_dataset.shape

clear_dataset= cl_dataset.dropna()

clear_dataset['bhk']=clear_dataset['size'].apply(lambda x: int(x.split(' ')[0]))


def convert_sqft_to_num(x):
    tokens = x.split('-')
    if len(tokens) == 2:
        return ((float(tokens[0])+float(tokens[1]))/2)
    try:
        return float(x)
    except:
        return None   
area = clear_dataset.copy()
area.total_sqft = area.total_sqft.apply(convert_sqft_to_num)
area = area[area.total_sqft.notnull()]

feature_scaling=area.copy()
feature_scaling['price_per_sqft'] = feature_scaling['price']*100000/feature_scaling['total_sqft']


feature_scaling.location = feature_scaling.location.apply(lambda x: x.strip())
location_stats = feature_scaling['location'].value_counts(ascending=False)
location_stats_less_than_10 = location_stats[location_stats<=10]
feature_scaling.location = feature_scaling.location.apply(lambda x: 'other' if x in location_stats_less_than_10 else x)

outliner_removal=feature_scaling[~(feature_scaling.total_sqft/feature_scaling.bhk<300)]
def remove_bhk_outliers(df):
    exclude_indices = np.array([])
    for location, location_df in df.groupby('location'):
        bhk_stats = {}
        for bhk, bhk_df in location_df.groupby('bhk'):
            bhk_stats[bhk] = {
                'mean': np.mean(bhk_df.price_per_sqft),
                'std': np.std(bhk_df.price_per_sqft),
                'count': bhk_df.shape[0]
            }
        for bhk, bhk_df in location_df.groupby('bhk'):
            stats = bhk_stats.get(bhk-1)
            if stats and stats['count']>5:
                exclude_indices = np.append(exclude_indices, bhk_df[bhk_df.price_per_sqft<(stats['mean'])].index.values)
    return df.drop(exclude_indices,axis='index')
outliner_removal = remove_bhk_outliers(outliner_removal)
outliner_removal = outliner_removal[outliner_removal.bath<outliner_removal.bhk+2]

fl_dataset=outliner_removal.drop(['size','price_per_sqft'], axis='columns')

dummies = pd.get_dummies(fl_dataset.location)
hot_encoded=pd.concat([fl_dataset,dummies.drop('other',axis='columns')],axis='columns')

final_dataset=hot_encoded.drop('location',axis='columns')


X=final_dataset.drop(['price'],axis='columns')
y=final_dataset.price
from sklearn.model_selection import train_test_split
X_train, X_test, y_train, y_test = train_test_split(X,y,test_size=0.2,random_state=10)
from sklearn.linear_model import LinearRegression
lr_clf = LinearRegression()
lr_clf.fit(X_train,y_train)
lr_clf.score(X_test,y_test)

def predict_price(location,sqft,bath,bhk):    
    loc_index = np.where(X.columns==location)[0][0]

    x = np.zeros(len(X.columns))
    x[0] = sqft
    x[1] = bath
    x[2] = bhk
    if loc_index >= 0:
        x[loc_index] = 1

    return lr_clf.predict([x])[0]

import pickle
with open('model.pickle','wb') as f:
    pickle.dump(lr_clf,f)
    
import json
columns = {
    'data_columns' : [col.lower() for col in X.columns]
}
with open("columns.json","w") as f:
    f.write(json.dumps(columns))
