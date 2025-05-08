from fastapi import APIRouter
from Schemas.model_project import add_project, id_project
from Models.models import add_project, get_Project, del_project, put_Project

router = APIRouter(
    prefix="/project",
    tags=["project"],
    responses={404: {"description": "Not found"}},
    )


router.post('/projects')
def post_projects(add_project: add_project):
    add_project.name = add_project.name
    add_project.description = add_project.description
    add_project.status = add_project.status
    return {"Status": "200"}

router.get('/projects')
def get_projects():
    return {"Status": "200"}

router.get('/projects/{id}')
def get_project(id: id_project):
    return get_Project(id)

router.put('/projects/{id}')
def put_project(id: id_project):
    return {"Status":"200"}

router.delete('/projects/{id}')
def del_project(id: id_project):
    return {"Dado apagado."}