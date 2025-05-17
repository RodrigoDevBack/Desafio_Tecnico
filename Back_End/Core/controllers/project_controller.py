from fastapi import APIRouter

from Back_End.Schemas.schema_project import Project_Create, Get_Id, Project_Update

from Back_End.Models.model_project import Project_Manager


router_project = APIRouter(
    tags=["Project"],
    responses={404: {"description": "Not found"}})

@router_project.post("/create")
async def create_project(createProject: Project_Create):
    project = await Project_Manager.create(
        name = createProject.name,
        description = createProject.description,
        status = createProject.status
        )
    return project

@router_project.get("/getall")
async def get_projects():
    projetos = await Project_Manager.all()
    return projetos


@router_project.post("/getone")
async def get_project(Id: Get_Id):
    projeto = await Project_Manager.get(id=Id.id)
    return projeto


@router_project.put("/update")
async def update_project(Id: Get_Id, update_project: Project_Update):
    project = await Project_Manager.get(id= Id.id)
    project_update = update_project.model_dump(exclude_unset=True, exclude_defaults=True, exclude_none=True)
    project.update_from_dict(project_update)
    await project.save()
    return project_update


@router_project.delete("/delete")
async def delete_project(Id: Get_Id):
    projeto = await Project_Manager.get(id=Id.id)
    await Project_Manager.filter(id=Id.id).delete()
    return projeto
