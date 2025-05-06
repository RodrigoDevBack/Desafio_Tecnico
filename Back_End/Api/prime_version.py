from fastapi import FastAPI
from Core.dbconfig import configure_db
from Schemas.model_project import add_project
from Models.models import Project

def appConfig():
    app = FastAPI()
    configure_db(app)
    return app

app = appConfig()

@app.post('/generate')
def get_projects(add_project: add_project):
    Project.name = add_project.name
    Project.description = add_project.description
    Project.status = add_project.status
    return {"Status": "200"}
