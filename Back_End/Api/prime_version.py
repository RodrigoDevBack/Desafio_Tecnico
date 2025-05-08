from fastapi import FastAPI
from Core.dbconfig import configure_db, configure_routers

def appConfig():
    app = FastAPI()
    
    configure_routers(app)
    configure_db(app)
    
    return app

app = appConfig()
