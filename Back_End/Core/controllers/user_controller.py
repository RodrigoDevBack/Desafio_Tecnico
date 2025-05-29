from typing import Annotated

from fastapi import APIRouter, Depends, HTTPException, status

from fastapi.security import OAuth2PasswordRequestForm

from Back_End.Schemas.schema_user import User_Register, User_Update, Get_Id, Get_Name

from Back_End.Models.model_user import User_Manager

from ..security import hash_password, hash_token_user

from ..depends.user import get_user_logon



router_user = APIRouter(
    tags=["User"],
    responses={404: {"description": "Not found"}})


@router_user.post("/login")
async def login_user(credentials: Annotated[OAuth2PasswordRequestForm, Depends()]):
    user = await User_Manager.get_or_none(name_user=credentials.username)
    
    if (user != None):
        if (user.user_hash_password == hash_password(credentials.password)):
            return {"access_token" : hash_token_user(user.id_user), "token_type" : "bearer"}
        else:
            raise HTTPException(status_code=status.HTTP_401_UNAUTHORIZED, detail="Invalid user or password")
    else:
        raise HTTPException(status_code=status.HTTP_401_UNAUTHORIZED, detail="Incorret user or password")


@router_user.post("/register")
async def register_user(register: User_Register):
    
    if await User_Manager.get_or_none(name_user=register.name) != None:
        raise HTTPException(status_code=status.HTTP_422_UNPROCESSABLE_ENTITY, detail="User already exists")
    
    registering = await User_Manager.create(
        name_user = register.name, 
        user_hash_password = register.password
        )
    
    return {"Result" : registering}


@router_user.get("/users")
async def get_users(user_logon: Annotated[str, Depends(get_user_logon)]):
    users = await User_Manager.all()
    
    return {"Result": users}


@router_user.put("/update")
async def update_user(user: Get_Name, update: User_Update):
    user_update = await User_Manager.get_or_none(name_user=user.search_user)
    
    if not user_update:
        raise HTTPException(status_code=status.HTTP_422_UNPROCESSABLE_ENTITY, detail="Invalid user")
    
    if await User_Manager.get_or_none(name_user=update.name_user) != None:
        raise HTTPException(status_code=status.HTTP_422_UNPROCESSABLE_ENTITY, detail="User already exists")

    if update.user_hash_password:
        update.user_hash_password = (hash_password(update.user_hash_password))

    data_update_user = update.model_dump(exclude_unset=True, exclude_defaults=True, exclude_none=True)
    user_update.update_from_dict(data = data_update_user)
    
    await user_update.save()
    
    return {"Result" : user_update}

@router_user.delete("/delete")
async def delete_user(id: Get_Id, user_logon: Annotated[str, Depends(get_user_logon)]):
    deleted = await User_Manager.get_or_none(id_user = id.id)
    
    if not deleted:
        raise HTTPException(status_code=status.HTTP_422_UNPROCESSABLE_ENTITY, detail="User not found")
    
    await User_Manager.filter(id_user = id.id).delete()
    
    return {"Result": deleted}
