import { createContext, Dispatch, SetStateAction, useState } from "react";

type MenuContextType = {
    isOpen: boolean;
    setIsOpen:  Dispatch<SetStateAction<boolean>>;
}

type MenuProviderProps = {
    children: React.ReactNode;
}

export const MenuContext = createContext<MenuContextType>({
    isOpen: false,
    setIsOpen: () => {},
});

export const MenuProvider = ({children}: MenuProviderProps) => {
    const [isOpen, setIsOpen] = useState(false);
    
    return(
        <MenuContext.Provider value={{isOpen, setIsOpen}}>
            {children}
        </MenuContext.Provider>
    )
}