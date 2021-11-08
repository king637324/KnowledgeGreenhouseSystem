import pymysql #資料庫套件
from selenium import webdriver
from bs4 import BeautifulSoup
import json

db = pymysql.connect(
        host='127.0.0.1',
        user='root',
        password='',
        database="laravelvuetest",
        port=3306
    )
cursor = db.cursor()

broswer = webdriver.Chrome()
broswer.get('https://rate.bot.com.tw/xrt/all/day')
usd_soup = BeautifulSoup(broswer.page_source,'html.parser')
usd_table = usd_soup.select('#ie11andabove > div > table > tbody > tr:nth-child(1) > td:nth-child(2)')[0].get_text()
cursor.execute("UPDATE usdollars SET USD = %s WHERE id = %s",(usd_table,1) )
db.commit()
broswer.close()