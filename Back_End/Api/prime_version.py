from fastapi import FastAPI
from Core.dbconfig import configure_db
from Schemas.model_project import addProject
from Models.models import add_project

def appConfig():
    app = FastAPI()

    configure_db(app)
    
    return app

app = appConfig()

@app.post('/projects/add')
async def post_projects(addProject: addProject):
    project = await add_project.create(
        name = addProject.name,
        description = addProject.description,
        status = addProject.status
        )
    return {"Status": "200"}

@app.get('/project/get')
def get_projects():
    return {"Status": "200"}