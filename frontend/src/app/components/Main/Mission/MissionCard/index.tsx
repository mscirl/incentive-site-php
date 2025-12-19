import { SvgIconTypeMap } from "@mui/material";
import { OverridableComponent } from "@mui/material/OverridableComponent";

type MissionCardProps = {
    icon: OverridableComponent<SvgIconTypeMap<{}, "svg">> & {
    muiName: string;},
    title: string;
    description: string;
}

export default function MissionCard({ icon: Icon, title, description }: MissionCardProps) {
    return (
        <div className='flex flex-col gap-2 items-center text-primary max-w-100 lg:max-w-70'>
            <Icon style={{ fontSize: '32px' }} />
            <h3 className='text-base font-semibold lg:text-lg'>{title}</h3>
            <p className='text-sm text-center'>{description}</p>
        </div>
    )
}