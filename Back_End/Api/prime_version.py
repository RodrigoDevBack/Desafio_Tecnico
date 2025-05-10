from fastapi import FastAPI
from Back_End.Core.configDB import lifespan, ConfigRouter

def appConfig():
    app = FastAPI(lifespan=lifespan)
    
    ConfigRouter(app)
    
    return app

app = appConfig()
