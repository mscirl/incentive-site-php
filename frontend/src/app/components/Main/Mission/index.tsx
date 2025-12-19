import SchoolIcon from '@mui/icons-material/School';
import VisibilityIcon from '@mui/icons-material/Visibility';
import TrackChangesIcon from '@mui/icons-material/TrackChanges';
import MissionCard from './MissionCard';

export default function Mission() {
    return (
        <div id="mission">
            <section>
                <div className='p-5 m-4 rounded-xl bg-gradient-to-b from-[#55818633] to-[#d4fbff33] md:p-8 md:mr-14 md:ml-14 md:mt-9 md:mb-9 lg:max-w-228 lg:ml-auto lg:mr-auto'>
                    <h2 className='text-secondary text-lg font-semibold text-center mb-3 lg:text-2xl lg:mb-5'>Missão, Visão e Valores</h2>
                    <div className='flex flex-col gap-5 items-center lg:flex-row lg:justify-center lg:gap-12'>
                        <MissionCard 
                            icon={SchoolIcon}
                            title="Missão"
                            description="Promover a inclusão social, a inovação e o desenvolvimento sustentável, fortalecendo indivíduos e comunidades por meio da educação, tecnologia, empreendedorismo e assistência social, com foco na equidade e na justiça social."
                        />

                        <MissionCard 
                            icon={VisibilityIcon}
                            title="Valores"
                            description="Ser reconhecido como uma referência nacional em transformação social, inovação e desenvolvimento sustentável, impactando positivamente a vida de milhares de pessoas e contribuindo para a construção de uma sociedade mais justa, inclusiva e resiliente."
                        />
                        
                        <MissionCard 
                            icon={TrackChangesIcon}
                            title="Valores"
                            description="Inclusão, Sustentabilidade, Inovação, Empoderamento, Respeito aos Direitos Humanos e Transparência."
                        />
                    </div>
                </div>
            </section>
        </div>
    )
}