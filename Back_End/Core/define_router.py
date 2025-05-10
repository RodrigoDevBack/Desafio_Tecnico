from fastapi import APIRouter
from Back_End.Models.model import Project_Manager
from Back_End.Schemas.model_project import addProject

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
    return {"Status": "200"}

@router.get("/get")
async def get_projects():
    projetos = await Project_Manager.all()
    return {"Projetos ": projetos}


@router.put("/put")
async def put_project():
    return {"Nada ainda." : "200"}


@router.delete("/delete")
async def delete_project():
    return {"Nada ainda." : "200"}
