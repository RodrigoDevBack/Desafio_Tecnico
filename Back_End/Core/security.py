from jose import jws
from jose import JWSError

def hash_password(password):
    password_hash = jws.sign({"key" : password}, "security", algorithm="HS256")
    return password_hash

def verify_password(hash_password):
    try:
        if jws.verify(hash_password, "security", algorithms="HS256"):
            return True
    except JWSError:
        return False