# -*- coding: utf-8 -*-
"""
Created on Thu Oct  7 10:42:52 2021

@author: user
"""

from spyne import Application, rpc, ServiceBase, Integer
from spyne.protocol.soap import Soap11
from spyne.server.wsgi import WsgiApplication


class Electric_auto(ServiceBase):
    
 @rpc(Integer, Integer, Integer, Integer, _returns=(float))
 def calcul(ctx, distance, vitesse, Autonomie, Temps_chargement):
     if Autonomie > distance:
         tp = distance / vitesse
     else:
         tp = distance / vitesse + Temps_chargement
     return(tp)
     #yield u'Votre trajet durera, %s' % tp 
            
application = Application([Electric_auto], 'spyne.examples.hello.soap',
in_protocol=Soap11(validator='lxml'),
out_protocol=Soap11())
wsgi_application = WsgiApplication(application)

from wsgiref.simple_server import make_server
server = make_server('127.0.0.1', 8000, wsgi_application)
server.serve_forever()

#http://127.0.0.1:8000/?wsdl
