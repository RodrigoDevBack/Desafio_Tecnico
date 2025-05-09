from fastapi import APIRouter
from Models.models import add_project
from Schemas.model_project import addProject

router = APIRouter()

@router.post('/projects/add')
async def post_projects(addProject: addProject):
    project = await add_project.create(
        name = addProject.name,
        description = addProject.description,
        status = addProject.status
        )
    return {"Status": "200"}

@router.get('/project/get')
def get_projects():
    return add_project.all
