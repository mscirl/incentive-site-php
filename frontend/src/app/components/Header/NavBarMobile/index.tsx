import NavItemMobile from "./NavItemMobile";

export default function NavBarMobile() {
    return (
        <div id="navbar-mobile" className="hidden p-5 bg-primary lg:hidden">
            <nav>
                <ul className="flex flex-col gap-5 text-center">
                    <NavItemMobile id="home">Início</NavItemMobile>
                    <NavItemMobile id="about">Quem Somos</NavItemMobile>
                    <NavItemMobile id="mission">Missão</NavItemMobile>
                    <NavItemMobile id="team">Equipe</NavItemMobile>
                    <NavItemMobile id="projects">Projetos</NavItemMobile>
                </ul>
            </nav>
        </div>
    )
}