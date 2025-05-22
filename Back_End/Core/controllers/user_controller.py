from fastapi import APIRouter

from Back_End.Schemas.schema_user import User_Register, User_Update, Get_Id, Get_Name

from Back_End.Models.model_user import User_Manager


router_user = APIRouter(
    tags=["User"],
    responses={404: {"description": "Not found"}})


@router_user.post("/login")
async def login_user(credentials: User_Register):
    user = await User_Manager.get_or_none(name_user=credentials.name)
    
    if (user != None):
        if (user.name_user == credentials.name and user.user_hash_password == credentials.password):
            return {"Fail": False, "Result" : True}
        else:
            return {"Fail": True, "Result" : "Usuário ou senha inválidos."}
    else:
        return {"Fail": True, "Result": "Usuário ou senha inválidos."}


@router_user.post("/register")
async def register_user(register: User_Register):
    
    if await User_Manager.get_or_none(name_user=register.name) != None:
        return {"Fail": True, "Result": "Usuário já existe"}
    
    registering = await User_Manager.create(
        name_user = register.name, 
        user_hash_password = register.password
        )
    
    return {"Fail" : False, "Result" : registering}


@router_user.get("/users")
async def get_users():
    users = await User_Manager.all()
    
    return users


@router_user.put("/update")
async def update_user(user: Get_Name, update: User_Update):
    user_update = await User_Manager.get_or_none(name_user=user.search_user)
    
    if not user_update:
        return {"Fail": True, "Result": "Usuário inválido"}
    
    if await User_Manager.get_or_none(name_user=update.name_user) != None:
        return {"Fail": True, "Result": "Usuário já existe"}
    
    data_update_user = update.model_dump(exclude_unset=True, exclude_defaults=True, exclude_none=True)
    user_update.update_from_dict(data = data_update_user)
    
    await user_update.save()
    
    return {'Fail': False, "Result" : user_update}

@router_user.delete("/delete")
async def delete_user(id: Get_Id):
    deleted = await User_Manager.get_or_none(id_user = id.id)
    
    if not deleted:
        return {"Fail": True, "Result": "Usuário não encontrado."}
    
    await User_Manager.filter(id_user = id.id).delete()
    
    return {"Fail": False, "Result": deleted}
