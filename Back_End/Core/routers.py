from fastapi import APIRouter

from Back_End.Core.controllers.project_controller import router_project

from Back_End.Core.controllers.user_controller import router_user

router = APIRouter()

router.include_router(router=router_project, prefix="/Project")
router.include_router(router=router_user, prefix="/user")
