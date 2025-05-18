from fastapi import APIRouter

from tortoise.exceptions import DoesNotExist

from Back_End.Schemas.schema_user import User_Register, User_Update, Get_Id, Get_Name

from Back_End.Models.model_user import User_Manager


router_user = APIRouter(
    tags=["User"],
    responses={404: {"description": "Not found"}})

@router_user.post("/login")
async def login_user(credentials: User_Register):
    user = await User_Manager.get(name_user=credentials.name)
    if ( user != None):
        if (user.name_user == credentials.name and user.user_hash_password == credentials.password):
            return {"Login" : "True"}
        else:
            return {"Fail": "Usuário ou senha inválidos."}
    else:
        return {"Fail": "Usuário ou senha inválidos."}

@router_user.post("/register")
async def register_user(register: User_Register):
    if await User_Manager.get(name_user=register.name) != None:
        return {"Fail": "Usuário já existe"}
    registering = await User_Manager.create(
        name_user= register.name,
        user_hash_password= register.password)
    
    return registering

@router_user.get("/users")
async def get_users():
    users = await User_Manager.all()
    
    return users

@router_user.put("/update")
async def update_user(user: Get_Name, update: User_Update):
    try:
        user_update = await User_Manager.get(name_user=user.search_user)
    except DoesNotExist:
        return {'Fail': 'Usuário inválido'}
    
    data_update_user = update.model_dump(exclude_unset=True, exclude_defaults=True, exclude_none=True)
    user_update.update_from_dict(data = data_update_user)
    
    await user_update.save()
    
    return user_update

@router_user.delete("/delete")
async def delete_user(id: Get_Id):
    deleted = await User_Manager.get(id_user = id.id)
    await User_Manager.filter(id_user = id.id).delete()
    
    return deleted