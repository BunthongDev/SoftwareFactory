import Link from 'next/link';
import React from 'react';
// phosphor icon
import * as Icon from "@phosphor-icons/react/dist/ssr";

const CaseStudy = () => {
    return (
        <div>
            <section className="case-study-block lg:pt-[100px] sm:pt-16 pt-10">
                <div className='container'>
                    <div className='heading text-center '>
                        <h3 className='heading3'>Case Studies</h3>
                        <div className='right flex flex-col items-center gap-2 mt-3'>
                            <div className='body3'>
                                Experience the excitement and potential of the 
                            </div>
                            <Link className='flex items-center gap-2 hover:text-blue duration-300' href=''>
                                <div className='text-button'>
                                    View All Case List
                                </div>
                                    <Icon.CaretDoubleRightIcon weight='bold' className='text-xs mt-1'/>
                            </Link>
                        </div>
                        
                    </div>
                </div>
            </section>
        </div>
    );
};

export default CaseStudy;