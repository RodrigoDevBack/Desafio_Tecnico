from fastapi import APIRouter

from Back_End.Schemas.schema_user import User_Register, User_Update, Get_Id

from Back_End.Models.model_user import User_Manager


router_user = APIRouter(
    tags=["User"],
    responses={404: {"description": "Not found"}})

@router_user.post("/register")
async def register_user(register: User_Register):
    registering = await User_Manager.create(
        name_user= register.name,
        user_hash_password= register.password)
    
    return registering

@router_user.get("/users")
async def get_users():
    users = await User_Manager.all()
    
    return users

@router_user.put("/update")
async def update_user(id: Get_Id, update: User_Update):
    user_update = await User_Manager.get(id_user = id.id)
    data_update_user = update.model_dump(exclude_unset=True, exclude_defaults=True, exclude_none=True)
    user_update.update_from_dict(data = data_update_user)
    
    user_update.save()
    
    return user_update

@router_user.delete("/delete")
async def delete_user(id: Get_Id):
    deleted = await User_Manager.get(id_user = id.id)
    await User_Manager.filter(id_user = id.id).delete()
    
    return deleted