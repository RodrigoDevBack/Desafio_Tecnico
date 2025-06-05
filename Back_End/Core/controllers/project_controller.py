from fastapi import APIRouter, Depends, HTTPException, status

from Back_End.Schemas.schema_project import Project_Create, Get_Id, Project_Update

from Back_End.Models.model_project import Project_Manager

from Back_End.Models.model_user import User_Manager

from ..depends.user import get_user_logon

from ...Schemas.responses.responses_user import User_Response, Project_Response

router_project = APIRouter(
    tags=["Project"],
    responses={404: {"description": "Not found"}}
    )


@router_project.post("/create", response_model=Project_Response)
async def create_project(createProject: Project_Create, idUser = Depends(get_user_logon)):
    user = await User_Manager.get(id_user=idUser)
    
    project = await Project_Manager.create(
        name = createProject.name, 
        description = createProject.description, 
        status = createProject.status,
        user = user
        )
    
    return project


@router_project.get("/getall", response_model= list[Project_Response])
async def get_projects(idUser = Depends(get_user_logon)):
    projects = await Project_Manager.filter(user = idUser)
    
    return projects


@router_project.post("/getone", response_model=Project_Response)
async def get_project(Id: Get_Id, idUser = Depends(get_user_logon)):
    project = await Project_Manager.get_or_none(user = idUser, id = Id.id)
    
    if not project or not Get_Id:
        raise HTTPException(
            status_code=status.HTTP_422_UNPROCESSABLE_ENTITY,
            detail="Project not found"
            )
    
    return project


@router_project.put("/update", response_model=Project_Response)
async def update_project(Id: Get_Id, update_project: Project_Update, idUser = Depends(get_user_logon)):
    project = await Project_Manager.get_or_none(user = idUser, id = Id.id)
    
    if not project:
        raise HTTPException(
            status_code=status.HTTP_422_UNPROCESSABLE_ENTITY,
            detail="Project not found"
            )
    
    project_update = update_project.model_dump(
        exclude_unset=True, 
        exclude_defaults=True, 
        exclude_none=True
        )
    project.update_from_dict(project_update)
    await project.save()
    
    return project


@router_project.delete("/delete", response_model=Project_Response)
async def delete_project(Id: Get_Id, idUser = Depends(get_user_logon)):
    project = await Project_Manager.get_or_none(user = idUser, id=Id.id)
    
    if not project:
        raise HTTPException(
            status_code=status.HTTP_422_UNPROCESSABLE_ENTITY,
            detail="Project not found"
            )
    
    await Project_Manager.filter(user = idUser, id=Id.id).delete()
    
    return project
