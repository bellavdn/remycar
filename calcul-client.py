# -*- coding: utf-8 -*-
"""
Created on Thu Oct  7 10:58:29 2021

@author: user
"""


import zeep

wsdl = 'http://127.0.0.1:8000/?wsdl'
client = zeep.Client(wsdl=wsdl)
print(client.service.calcul(300, 100, 430, 4))