import pandas as pd
import numpy as np
from matplotlib import pyplot as plt
import matplotlib 
matplotlib.rcParams["figure.figsize"] = (20,10)

dataset = pd.read_csv("bengaluru_house_prices.csv")
dataset.head()

cl_dataset = dataset.drop(['area_type','society','balcony'],axis='columns')
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

outliner_removal['availability'] = outliner_removal['availability'].apply(lambda x: 1 if x == 'Ready To Move' else 0)


fl_dataset=outliner_removal.drop(['size','price_per_sqft'], axis='columns')

dummies = pd.get_dummies(fl_dataset.location)
hot_encoded=pd.concat([fl_dataset,dummies.drop('other',axis='columns')],axis='columns')

final_dataset=hot_encoded.drop(['location','price','total_sqft','bath','bhk'],axis='columns')

X=final_dataset.drop(['availability'],axis='columns')
y=final_dataset.availability
from sklearn.model_selection import train_test_split
X_train, X_test, y_train, y_test = train_test_split(X,y,test_size=0.2,random_state=10)
from sklearn.linear_model import LinearRegression
lr_clf = LinearRegression()
lr_clf.fit(X_train,y_train)
lr_clf.score(X_test,y_test)

def avail(location):    
    loc_index = np.where(X.columns==location)[0][0]

    x = np.zeros(len(X.columns))
    if loc_index >= 0:
        x[loc_index] = 1

    return lr_clf.predict([x])[0]

from sklearn.ensemble import RandomForestRegressor

regressor = RandomForestRegressor(n_estimators=20, random_state=0)
regressor.fit(X_train, y_train)
y_pred = regressor.predict(X_test)