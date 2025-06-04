from typing import Optional, Annotated

from fastapi.security import OAuth2PasswordBearer
from fastapi import Depends, status, HTTPException
from jose import jwt, JWTError
from pydantic import BaseModel, ValidationError

from ...Models.model_user import User_Manager

from ..security import JWT_ALGORITHM, SECRET_KEY

class TokenPayload(BaseModel):
    sub: Optional[int] = None
    
reusable_oauth2 = OAuth2PasswordBearer(tokenUrl="/user/login")

async def get_user_logon(hash_token: Annotated[str, Depends(reusable_oauth2)]):
    try:
        token_decode = jwt.decode(hash_token, SECRET_KEY, algorithms=[JWT_ALGORITHM])
        token_valid = TokenPayload(**token_decode)
        
    except (JWTError, ValidationError):
        raise HTTPException(
            status_code= status.HTTP_403_FORBIDDEN,
            detail=f"Could not validate credentials"
            )
        
    user = await User_Manager.get_or_none(id_user = token_valid.sub)    
    if not user:
        raise HTTPException(status_code=status.HTTP_404_NOT_FOUND, detail="User not exists")
    
    return int(user.id_user)
        