import Partner from "@/components/Partner/Partner";
import { getCaseStudies } from "@/lib/data/casestudies";
import CaseStudyCardDetailed from "@/components/CaseStudy/CaseStudyCardDetailed"; // 👈 Use the detailed card

export default async function CaseStudiesPage() {
  const allCaseStudies = await getCaseStudies();

  return (
    <div className="overflow-x-hidden">
      <main className="content">
        <section className="bg-slate-50 py-24 sm:py-32">
          <div className="container mx-auto px-4">
            <div className="text-center mb-16 max-w-3xl mx-auto">
              <h1 className="text-4xl md:text-5xl font-bold text-gray-900">
                Client's Success is Our Goal 🏆
              </h1>
              <p className="mt-4 text-lg text-gray-600">
                We deliver results. Explore our case studies to see how we build
                innovative solutions that drive measurable growth.
              </p>
            </div>

            <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
              {allCaseStudies.length > 0 ? (
                allCaseStudies.map((study) => (
                  <CaseStudyCardDetailed key={study.id} study={study} />
                ))
              ) : (
                <p className="col-span-full text-center">
                  No case studies available.
                </p>
              )}
            </div>
          </div>
        </section>
      </main>
      <Partner className="lg:mt-[100px] sm:mt-16 mt-10" />
    </div>
  );
}