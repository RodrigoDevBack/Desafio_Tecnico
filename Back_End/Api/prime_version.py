from fastapi import FastAPI
from Back_End.Core.configDB import lifespan, ConfigRouter
from Back_End.Core.images_config.config import configure_image

def appConfig():
    app = FastAPI(lifespan=lifespan)
    
    ConfigRouter(app)
    
    configure_image(app)
    
    return app

app = appConfig()
