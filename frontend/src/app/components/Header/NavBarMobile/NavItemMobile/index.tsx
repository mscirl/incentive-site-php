import Link from "next/link";
import { useContext } from "react";
import { MenuContext } from "@/app/context/MenuContext";

type NavItemMobileProps = {
    children: string,
    id: string
}

export default function NavItemMobile({children, id}: NavItemMobileProps) {
    const {isOpen, setIsOpen} = useContext(MenuContext);

    return (
        <li className="text-secondary"><Link href={`#${id}`} onClick={() => {
            setIsOpen(isOpen => !isOpen)
            document.getElementById("navbar-mobile")?.classList.toggle("hidden");
        }}>{children}</Link></li>
    )
}
