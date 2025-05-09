from fastapi import FastAPI
from Core.dbconfig import configure_db, config_router
from Schemas.model_project import addProject
from Models.models import add_project

def appConfig():
    app = FastAPI()
    
    config_router(app)

    configure_db(app)
    
    return app

app = appConfig()
