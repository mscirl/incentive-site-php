import Link from "next/link";
import Image from "next/image";
import NavBar from "./NavBar";
import NavBarMobile from "./NavBarMobile";
import ToggleMenuButton from "./ToggleMenuButton";
import { useEffect, useState } from "react";

export default function Header() {
    const [scroller, setScroller] = useState(false);

    useEffect(() => {
        const handleScroll = () => {
            window.scrollY > 147.1999969482422 ? setScroller(true) : setScroller(false);
        }

        window.addEventListener("scroll", handleScroll);
    }, [])

    return (
        <header className={`bg-white shadow-primary lg:fixed lg:w-full lg:z-50 ${scroller ? 'lg:bg-white' : 'lg:bg-[#FFFFFF36]'}`} >
            <div className="flex items-center justify-between pl-6 pr-6 lg:h-31">
                <Link href={"#home"} className="shrink-0">
                    <Image src={"/logo-1.svg"} style={{ 'width': '124px' }} width={150} height={100} alt="Instituto Incentive" />
                </Link>
                <NavBar />
                <ToggleMenuButton />
            </div>
            <NavBarMobile />
        </header>
    )
}
