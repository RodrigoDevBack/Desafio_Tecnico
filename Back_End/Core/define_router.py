from fastapi import APIRouter
from Back_End.Models.model import Project_Manager
from Back_End.Schemas.model_project import addProject, idGet, editProject

router = APIRouter(
    prefix="/Project",
    tags=["Project"],
    responses={404: {"description": "Not found"}})

@router.post("/add")
async def post_projects(addProject: addProject):
    project = await Project_Manager.create(
        name = addProject.name,
        description = addProject.description,
        status = addProject.status
        )
    return {"Status": "201"}

@router.get("/getall")
async def get_projects():
    projetos = await Project_Manager.all()
    return {"Projetos ": projetos}


@router.post("/getone")
async def get_project(Id: idGet):
    projeto = await Project_Manager.get(id=Id.id)
    return {f"Projeto {Id}": projeto}


@router.put("/put")
async def put_project(Id: idGet, edit: editProject):
    projeto = await Project_Manager.filter(id=Id.id).update(status=edit.status, name=edit.name, description=edit.description)
    return {"Status" : "201"}


@router.delete("/delete")
async def delete_project(Id: idGet):
    projeto = await Project_Manager.get(id=Id.id)
    await Project_Manager.filter(id=Id.id).delete()
    return {"Status" : "200"}
