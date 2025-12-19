"use client";
import MenuIcon from "@mui/icons-material/Menu";
import CloseIcon from "@mui/icons-material/Close";
import { useContext } from "react";
import { MenuContext } from "@/app/context/MenuContext";

export default function ToggleMenuButton() {
    const {isOpen, setIsOpen} = useContext(MenuContext);

    return (
        <button className="lg:hidden" onClick={() => {
            setIsOpen(!isOpen)
            document.getElementById("navbar-mobile")?.classList.toggle("hidden");
        }}>
            {
                isOpen ? <CloseIcon style={{'fontSize':'32px'}} className="text-primary"/> :
                <MenuIcon style={{'fontSize':'32px'}} className="text-primary"/>
            }
        </button>
    )
}