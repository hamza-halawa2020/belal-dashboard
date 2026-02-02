<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Staff;
use App\Models\SuccessPartner;
use App\Models\Review;
use App\Models\Service;
use App\Models\FeasibilityStudy;
use App\Models\InvestmentOpportunity;
use App\Models\Faq;
use App\Models\Post;
use App\Models\MainSlider;
use App\Models\Contact;
use App\Models\WorkSample;
use App\Models\FeasibilityStudyRequest;

class ComprehensiveSeeder extends Seeder
{
    public function run()
    {
        // إنشاء المستخدمين أولاً
        $admin = User::create([
            'name' => 'أحمد محمد',
            'email' => 'admin@example.com',
            'password' => bcrypt('12345678'),
        ]);

        $manager = User::create([
            'name' => 'سارة أحمد',
            'email' => 'manager@company.com',
            'password' => bcrypt('password123'),
        ]);

        // إنشاء الفئات
        $category1 = Category::create([
            'title' => 'المطاعم والمقاهي',
            'image' => 'categories/restaurant.jpg',
            'status' => 1,
            'created_by' => $admin->id,
        ]);

        $category2 = Category::create([
            'title' => 'التجارة الإلكترونية',
            'image' => 'categories/ecommerce.jpg',
            'status' => 1,
            'created_by' => $admin->id,
        ]);

        $category3 = Category::create([
            'title' => 'الخدمات التقنية',
            'image' => 'categories/tech.jpg',
            'status' => 1,
            'created_by' => $admin->id,
        ]);

        $category4 = Category::create([
            'title' => 'التعليم والتدريب',
            'image' => 'categories/education.jpg',
            'status' => 1,
            'created_by' => $admin->id,
        ]);

        $category5 = Category::create([
            'title' => 'الصحة والجمال',
            'image' => 'categories/health.jpg',
            'status' => 1,
            'created_by' => $admin->id,
        ]);

        // إنشاء فريق العمل
        $staff = [
            [
                'name' => 'د. محمد عبدالله',
                'job_title' => 'مدير عام',
                'image' => 'staff/ceo.jpg',
                'status' => 1,
                'created_by' => $admin->id,
            ],
            [
                'name' => 'أ. فاطمة أحمد',
                'job_title' => 'مديرة التسويق',
                'image' => 'staff/marketing.jpg',
                'status' => 1,
                'created_by' => $admin->id,
            ],
            [
                'name' => 'م. خالد محمود',
                'job_title' => 'مدير المشاريع',
                'image' => 'staff/projects.jpg',
                'status' => 1,
                'created_by' => $admin->id,
            ],
            [
                'name' => 'أ. نورا سالم',
                'job_title' => 'محللة مالية',
                'image' => 'staff/financial.jpg',
                'status' => 1,
                'created_by' => $admin->id,
            ],
            [
                'name' => 'م. أحمد حسن',
                'job_title' => 'استشاري أعمال',
                'image' => 'staff/consultant.jpg',
                'status' => 1,
                'created_by' => $admin->id,
            ],
        ];

        foreach ($staff as $member) {
            Staff::create($member);
        }

        // إنشاء شركاء النجاح
        $partners = [
            [
                'name' => 'بنك الراجحي',
                'link' => 'https://alrajhibank.com.sa',
                'image' => 'partners/alrajhi.jpg',
                'status' => 1,
                'created_by' => $admin->id,
            ],
            [
                'name' => 'شركة أرامكو السعودية',
                'link' => 'https://aramco.com',
                'image' => 'partners/aramco.jpg',
                'status' => 1,
                'created_by' => $admin->id,
            ],
            [
                'name' => 'مجموعة سامبا المالية',
                'link' => 'https://samba.com',
                'image' => 'partners/samba.jpg',
                'status' => 1,
                'created_by' => $admin->id,
            ],
            [
                'name' => 'شركة الاتصالات السعودية',
                'link' => 'https://stc.com.sa',
                'image' => 'partners/stc.jpg',
                'status' => 1,
                'created_by' => $admin->id,
            ],
            [
                'name' => 'مجموعة العثيم',
                'link' => 'https://othaim.com',
                'image' => 'partners/othaim.jpg',
                'status' => 1,
                'created_by' => $admin->id,
            ],
        ];

        foreach ($partners as $partner) {
            SuccessPartner::create($partner);
        }

        // إنشاء التقييمات
        $reviews = [
            [
                'name' => 'عبدالرحمن الأحمد',
                'review' => 'خدمة ممتازة وفريق محترف. ساعدوني في إعداد دراسة جدوى شاملة لمشروع مطعمي الجديد. النتائج فاقت توقعاتي والمشروع حقق أرباحاً ممتازة.',
                'status' => 1,
                'approved_by' => $admin->id,
            ],
            [
                'name' => 'نورا السالم',
                'review' => 'أنصح بشدة بالتعامل مع هذه الشركة. دراسة الجدوى كانت دقيقة ومفصلة، وساعدتني في اتخاذ قرار صحيح بخصوص مشروع التجارة الإلكترونية.',
                'status' => 1,
                'approved_by' => $admin->id,
            ],
            [
                'name' => 'محمد العتيبي',
                'review' => 'فريق عمل متميز ومتعاون. قدموا لي استشارة شاملة وساعدوني في تطوير خطة عمل ناجحة لمشروع الخدمات التقنية.',
                'status' => 1,
                'approved_by' => $admin->id,
            ],
            [
                'name' => 'سارة المطيري',
                'review' => 'خدمة عملاء رائعة ومتابعة مستمرة. دراسة الجدوى ساعدتني في الحصول على تمويل بنكي لمشروع مركز التدريب.',
                'status' => 1,
                'approved_by' => $admin->id,
            ],
            [
                'name' => 'خالد الزهراني',
                'review' => 'أفضل شركة تعاملت معها في مجال دراسات الجدوى. التحليل المالي كان دقيقاً جداً والتوقعات تحققت بالفعل.',
                'status' => 1,
                'approved_by' => $admin->id,
            ],
        ];

        foreach ($reviews as $review) {
            Review::create($review);
        }
        // إنشاء الخدمات
        $services = [
            [
                'title' => 'دراسات الجدوى الاقتصادية',
                'description' => 'نقدم دراسات جدوى شاملة ومفصلة تشمل التحليل المالي والتسويقي والفني لضمان نجاح مشروعك. فريقنا من الخبراء يستخدم أحدث الأساليب والأدوات لتقديم تحليل دقيق وموثوق.',
                'image' => 'services/feasibility.jpg',
                'status' => 1,
                'created_by' => $admin->id,
            ],
            [
                'title' => 'الاستشارات المالية',
                'description' => 'نوفر استشارات مالية متخصصة تساعدك في اتخاذ القرارات المالية الصحيحة وإدارة الموارد المالية بكفاءة عالية. خدماتنا تشمل التخطيط المالي وتحليل المخاطر.',
                'image' => 'services/financial.jpg',
                'status' => 1,
                'created_by' => $admin->id,
            ],
            [
                'title' => 'خطط الأعمال',
                'description' => 'نساعدك في إعداد خطط أعمال احترافية ومتكاملة تشمل جميع جوانب المشروع من التسويق والعمليات والتمويل. خططنا معدة وفقاً لأفضل المعايير الدولية.',
                'image' => 'services/business-plan.jpg',
                'status' => 1,
                'created_by' => $admin->id,
            ],
            [
                'title' => 'تحليل السوق',
                'description' => 'نقوم بدراسة وتحليل السوق المستهدف بعمق لفهم احتياجات العملاء والمنافسين والفرص المتاحة. تحليلاتنا تساعدك في وضع استراتيجية تسويقية فعالة.',
                'image' => 'services/market-analysis.jpg',
                'status' => 1,
                'created_by' => $admin->id,
            ],
            [
                'title' => 'إدارة المشاريع',
                'description' => 'نوفر خدمات إدارة المشاريع الاحترافية من التخطيط والتنفيذ والمتابعة حتى التسليم. فريقنا المتخصص يضمن تنفيذ مشروعك في الوقت المحدد وضمن الميزانية.',
                'image' => 'services/project-management.jpg',
                'status' => 1,
                'created_by' => $admin->id,
            ],
            [
                'title' => 'التدريب وتطوير الأعمال',
                'description' => 'نقدم برامج تدريبية متخصصة في ريادة الأعمال وإدارة المشاريع والتخطيط الاستراتيجي. برامجنا مصممة لتطوير مهاراتك وقدراتك في إدارة الأعمال.',
                'image' => 'services/training.jpg',
                'status' => 1,
                'created_by' => $admin->id,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }

        // إنشاء دراسات الجدوى
        $feasibilityStudies = [
            [
                'title' => 'مشروع مطعم الوجبات السريعة',
                'description' => 'دراسة جدوى شاملة لإنشاء مطعم وجبات سريعة في منطقة تجارية حيوية. المشروع يستهدف الشباب والعائلات ويقدم وجبات عالية الجودة بأسعار منافسة.',
                'image' => 'studies/restaurant.jpg',
                'money_capital' => '500000',
                'rate_of_return' => '35',
                'services' => json_encode(['إعداد القوائم', 'التسويق الرقمي', 'إدارة العمليات', 'خدمة التوصيل']),
                'study_content' => 'تشمل الدراسة تحليل السوق المحلي، دراسة المنافسين، التحليل المالي المفصل، خطة التسويق، والتحليل الفني للمشروع. كما تتضمن دراسة الموقع المقترح وتحليل حركة المرور والعملاء المحتملين.',
                'financial_metrics' => json_encode([
                    'فترة الاسترداد' => '2.8 سنة',
                    'صافي القيمة الحالية' => '750,000 ريال',
                    'معدل العائد الداخلي' => '35%',
                    'نقطة التعادل' => '18 شهر'
                ]),
                'status' => 1,
                'created_by' => $admin->id,
                'category_id' => $category1->id,
            ],
            [
                'title' => 'متجر إلكتروني للأزياء النسائية',
                'description' => 'دراسة جدوى لإطلاق متجر إلكتروني متخصص في الأزياء النسائية العصرية. المشروع يستهدف النساء من عمر 18-45 سنة ويركز على الجودة والأناقة.',
                'image' => 'studies/fashion-store.jpg',
                'money_capital' => '300000',
                'rate_of_return' => '42',
                'services' => json_encode(['تطوير الموقع', 'إدارة المخزون', 'التسويق الإلكتروني', 'خدمة العملاء']),
                'study_content' => 'الدراسة تغطي تحليل السوق الإلكتروني، استراتيجية التسويق الرقمي، دراسة سلوك المستهلك الإلكتروني، التحليل التقني للمنصة، وخطة العمليات اللوجستية.',
                'financial_metrics' => json_encode([
                    'فترة الاسترداد' => '2.4 سنة',
                    'صافي القيمة الحالية' => '450,000 ريال',
                    'معدل العائد الداخلي' => '42%',
                    'نقطة التعادل' => '14 شهر'
                ]),
                'status' => 1,
                'created_by' => $admin->id,
                'category_id' => $category2->id,
            ],
            [
                'title' => 'شركة تطوير التطبيقات الذكية',
                'description' => 'دراسة جدوى لتأسيس شركة متخصصة في تطوير التطبيقات الذكية للشركات والأفراد. الشركة تقدم حلول تقنية مبتكرة ومتطورة.',
                'image' => 'studies/app-development.jpg',
                'money_capital' => '800000',
                'rate_of_return' => '38',
                'services' => json_encode(['تطوير التطبيقات', 'تصميم واجهات المستخدم', 'الاستشارات التقنية', 'الصيانة والدعم']),
                'study_content' => 'تتضمن الدراسة تحليل السوق التقني، دراسة الاتجاهات التكنولوجية، تحليل المنافسة، خطة التوظيف والتدريب، واستراتيجية التسعير والتسويق.',
                'financial_metrics' => json_encode([
                    'فترة الاسترداد' => '3.1 سنة',
                    'صافي القيمة الحالية' => '920,000 ريال',
                    'معدل العائد الداخلي' => '38%',
                    'نقطة التعادل' => '20 شهر'
                ]),
                'status' => 1,
                'created_by' => $admin->id,
                'category_id' => $category3->id,
            ],
        ];

        foreach ($feasibilityStudies as $study) {
            FeasibilityStudy::create($study);
        }

        // إنشاء الفرص الاستثمارية
        $investmentOpportunities = [
            [
                'title' => 'الاستثمار في قطاع التعليم الإلكتروني',
                'description' => 'فرصة استثمارية مميزة في قطاع التعليم الإلكتروني المتنامي. القطاع يشهد نمواً سريعاً ويوفر عوائد مجزية للمستثمرين مع إمكانيات توسع كبيرة.',
                'image' => 'investments/elearning.jpg',
                'status' => 1,
                'created_by' => $admin->id,
            ],
            [
                'title' => 'مشاريع الطاقة المتجددة',
                'description' => 'استثمار في مشاريع الطاقة الشمسية وطاقة الرياح. فرصة للمساهمة في التنمية المستدامة وتحقيق عوائد مالية ممتازة في نفس الوقت.',
                'image' => 'investments/renewable-energy.jpg',
                'status' => 1,
                'created_by' => $admin->id,
            ],
            [
                'title' => 'الاستثمار في التكنولوجيا المالية',
                'description' => 'فرص استثمارية في شركات التكنولوجيا المالية الناشئة. قطاع واعد يشهد نمواً متسارعاً ويوفر حلول مالية مبتكرة.',
                'image' => 'investments/fintech.jpg',
                'status' => 1,
                'created_by' => $admin->id,
            ],
            [
                'title' => 'مشاريع الصحة الرقمية',
                'description' => 'استثمار في تطبيقات ومنصات الصحة الرقمية. قطاع حيوي يلبي احتياجات متزايدة في المجتمع ويحقق عوائد مستدامة.',
                'image' => 'investments/digital-health.jpg',
                'status' => 1,
                'created_by' => $admin->id,
            ],
        ];

        foreach ($investmentOpportunities as $opportunity) {
            InvestmentOpportunity::create($opportunity);
        }
        // إنشاء الأسئلة الشائعة
        $faqs = [
            [
                'question' => 'ما هي دراسة الجدوى وما أهميتها؟',
                'answer' => 'دراسة الجدوى هي تحليل شامل لمشروع مقترح لتحديد إمكانية نجاحه من الناحية التقنية والمالية والتسويقية. أهميتها تكمن في مساعدة المستثمرين على اتخاذ قرارات مدروسة وتجنب المخاطر المالية.',
                'status' => 1,
                'created_by' => $admin->id,
            ],
            [
                'question' => 'كم تستغرق عملية إعداد دراسة الجدوى؟',
                'answer' => 'تختلف المدة حسب حجم وتعقيد المشروع، لكن عادة تتراوح بين 2-6 أسابيع للمشاريع المتوسطة. نحن نلتزم بالمواعيد المحددة ونقدم تحديثات دورية عن سير العمل.',
                'status' => 1,
                'created_by' => $admin->id,
            ],
            [
                'question' => 'هل تقدمون استشارات مجانية؟',
                'answer' => 'نعم، نقدم استشارة أولية مجانية لمدة 30 دقيقة لمناقشة فكرة مشروعك وتقديم التوجيه الأولي. يمكنك حجز موعد من خلال موقعنا أو الاتصال بنا مباشرة.',
                'status' => 1,
                'created_by' => $admin->id,
            ],
            [
                'question' => 'ما هي تكلفة دراسة الجدوى؟',
                'answer' => 'تختلف التكلفة حسب نوع وحجم المشروع. نقدم عروض أسعار مخصصة بعد دراسة متطلبات مشروعك. أسعارنا تنافسية وتتناسب مع جودة الخدمة المقدمة.',
                'status' => 1,
                'created_by' => $admin->id,
            ],
            [
                'question' => 'هل تساعدون في الحصول على التمويل؟',
                'answer' => 'نعم، نساعد عملاءنا في إعداد الوثائق المطلوبة للحصول على التمويل البنكي أو من صناديق الاستثمار. لدينا شراكات مع عدة جهات تمويلية تسهل عملية الحصول على التمويل.',
                'status' => 1,
                'created_by' => $admin->id,
            ],
            [
                'question' => 'هل تقدمون خدمات المتابعة بعد إنجاز الدراسة؟',
                'answer' => 'نعم، نقدم خدمات المتابعة والاستشارة لمدة 6 أشهر بعد تسليم الدراسة مجاناً. كما نوفر خدمات إضافية مثل مراجعة الأداء وتحديث الخطط حسب الحاجة.',
                'status' => 1,
                'created_by' => $admin->id,
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::create($faq);
        }

        // إنشاء المقالات
        $posts = [
            [
                'title' => 'أهمية دراسة الجدوى في نجاح المشاريع الصغيرة',
                'description' => 'تعتبر دراسة الجدوى من أهم الخطوات التي يجب على رائد الأعمال القيام بها قبل البدء في أي مشروع. في هذا المقال نستعرض أهمية دراسة الجدوى وكيف تساهم في نجاح المشاريع الصغيرة والمتوسطة. نناقش العناصر الأساسية لدراسة الجدوى وكيفية إعدادها بطريقة احترافية تضمن اتخاذ قرارات استثمارية صحيحة.',
                'image' => 'posts/feasibility-importance.jpg',
                'status' => 1,
                'created_by' => $admin->id,
            ],
            [
                'title' => 'اتجاهات الاستثمار في التكنولوجيا لعام 2026',
                'description' => 'نستكشف في هذا المقال أحدث اتجاهات الاستثمار في قطاع التكنولوجيا لعام 2026. نتناول الفرص الاستثمارية الواعدة في الذكاء الاصطناعي، إنترنت الأشياء، البلوك تشين، والتكنولوجيا المالية. كما نقدم نصائح للمستثمرين حول كيفية اختيار الفرص الاستثمارية المناسبة وتقييم المخاطر.',
                'image' => 'posts/tech-investment-trends.jpg',
                'status' => 1,
                'created_by' => $admin->id,
            ],
            [
                'title' => 'كيفية إعداد خطة عمل ناجحة',
                'description' => 'خطة العمل هي خارطة الطريق لنجاح أي مشروع. في هذا المقال نقدم دليلاً شاملاً لإعداد خطة عمل احترافية تشمل جميع العناصر الضرورية من تحليل السوق والمنافسين إلى الخطة المالية والتسويقية. نشارك أيضاً أمثلة عملية ونصائح من خبراء في مجال ريادة الأعمال.',
                'image' => 'posts/business-plan-guide.jpg',
                'status' => 1,
                'created_by' => $admin->id,
            ],
            [
                'title' => 'التحول الرقمي وأثره على الأعمال التجارية',
                'description' => 'يشهد العالم تسارعاً في عملية التحول الرقمي، وهذا يؤثر بشكل كبير على طريقة ممارسة الأعمال التجارية. نناقش في هذا المقال كيف يمكن للشركات الاستفادة من التحول الرقمي لتحسين عملياتها وزيادة كفاءتها. نستعرض أيضاً التحديات والفرص التي يوفرها التحول الرقمي.',
                'image' => 'posts/digital-transformation.jpg',
                'status' => 1,
                'created_by' => $admin->id,
            ],
        ];

        foreach ($posts as $post) {
            Post::create($post);
        }

        // إنشاء شرائح العرض الرئيسية
        $sliders = [
            [
                'title' => 'نحول أفكارك إلى مشاريع ناجحة',
                'description' => 'نقدم دراسات جدوى احترافية ومتكاملة تساعدك في اتخاذ قرارات استثمارية صحيحة وتحقيق النجاح في مشروعك',
                'link' => '/services',
                'image' => 'sliders/main-slide-1.jpg',
                'status' => 1,
                'created_by' => $admin->id,
            ],
            [
                'title' => 'خبرة تزيد عن 10 سنوات في دراسات الجدوى',
                'description' => 'فريق من الخبراء والمتخصصين يقدم لك أفضل الحلول والاستشارات لضمان نجاح مشروعك وتحقيق أهدافك',
                'link' => '/about',
                'image' => 'sliders/main-slide-2.jpg',
                'status' => 1,
                'created_by' => $admin->id,
            ],
            [
                'title' => 'شريكك في النجاح والتميز',
                'description' => 'نساعدك في كل خطوة من خطوات مشروعك من الفكرة إلى التنفيذ مع متابعة مستمرة لضمان تحقيق أفضل النتائج',
                'link' => '/contact',
                'image' => 'sliders/main-slide-3.jpg',
                'status' => 1,
                'created_by' => $admin->id,
            ],
        ];

        foreach ($sliders as $slider) {
            MainSlider::create($slider);
        }

        // إنشاء رسائل التواصل
        $contacts = [
            [
                'name' => 'أحمد محمد العلي',
                'phone' => '+966501234567',
                'message' => 'أرغب في الحصول على استشارة حول مشروع مطعم جديد في الرياض. هل يمكنكم مساعدتي في إعداد دراسة جدوى شاملة؟',
            ],
            [
                'name' => 'فاطمة أحمد السالم',
                'phone' => '+966507654321',
                'message' => 'لدي فكرة لمتجر إلكتروني وأحتاج إلى دراسة جدوى مفصلة. متى يمكنني الحصول على موعد للاستشارة؟',
            ],
            [
                'name' => 'خالد عبدالله المطيري',
                'phone' => '+966512345678',
                'message' => 'أبحث عن شريك استثماري لمشروع تقني. هل تقدمون خدمات في هذا المجال؟',
            ],
        ];

        foreach ($contacts as $contact) {
            Contact::create($contact);
        }
        // إنشاء عينات الأعمال
        $workSamples = [
            [
                'title' => 'مشروع سلسلة مقاهي القهوة المختصة',
                'description' => 'دراسة جدوى شاملة لإنشاء سلسلة مقاهي متخصصة في القهوة المختصة. المشروع يستهدف محبي القهوة عالية الجودة ويقدم تجربة فريدة في أجواء مريحة وعصرية.',
                'image' => 'work-samples/coffee-chain.jpg',
                'money_capital' => '1200000',
                'rate_of_return' => '40',
                'services' => json_encode(['تصميم المقاهي', 'تدريب الموظفين', 'إدارة سلسلة التوريد', 'التسويق والعلامة التجارية']),
                'study_content' => 'شملت الدراسة تحليل سوق القهوة المختصة، دراسة سلوك المستهلكين، تحليل المواقع المقترحة، خطة التوسع، والتحليل المالي المفصل لكل فرع. كما تضمنت استراتيجية العلامة التجارية وخطة التسويق الرقمي.',
                'financial_metrics' => json_encode([
                    'فترة الاسترداد' => '3.2 سنة',
                    'صافي القيمة الحالية' => '1,800,000 ريال',
                    'معدل العائد الداخلي' => '40%',
                    'نقطة التعادل' => '22 شهر'
                ]),
                'status' => 1,
                'created_by' => $admin->id,
            ],
            [
                'title' => 'منصة التعليم الإلكتروني للمهارات التقنية',
                'description' => 'دراسة جدوى لتطوير منصة تعليمية إلكترونية متخصصة في تعليم المهارات التقنية والبرمجة. المنصة تستهدف الطلاب والمهنيين الراغبين في تطوير مهاراتهم التقنية.',
                'image' => 'work-samples/elearning-platform.jpg',
                'money_capital' => '900000',
                'rate_of_return' => '45',
                'services' => json_encode(['تطوير المنصة', 'إنتاج المحتوى التعليمي', 'نظام إدارة التعلم', 'التسويق الرقمي']),
                'study_content' => 'تضمنت الدراسة تحليل سوق التعليم الإلكتروني، دراسة احتياجات المتعلمين، تحليل المنافسين، التحليل التقني للمنصة، خطة المحتوى التعليمي، واستراتيجية التسعير والاشتراكات.',
                'financial_metrics' => json_encode([
                    'فترة الاسترداد' => '2.6 سنة',
                    'صافي القيمة الحالية' => '1,350,000 ريال',
                    'معدل العائد الداخلي' => '45%',
                    'نقطة التعادل' => '18 شهر'
                ]),
                'status' => 1,
                'created_by' => $admin->id,
            ],
            [
                'title' => 'مركز اللياقة البدنية المتكامل',
                'description' => 'دراسة جدوى لإنشاء مركز لياقة بدنية متكامل يقدم خدمات متنوعة تشمل الصالات الرياضية، الفصول الجماعية، التدريب الشخصي، والاستشارات الغذائية.',
                'image' => 'work-samples/fitness-center.jpg',
                'money_capital' => '750000',
                'rate_of_return' => '38',
                'services' => json_encode(['تجهيز الصالات', 'برامج التدريب', 'الاستشارات الغذائية', 'إدارة العضويات']),
                'study_content' => 'شملت الدراسة تحليل سوق اللياقة البدنية، دراسة الموقع والمنطقة المحيطة، تحليل الفئات المستهدفة، خطة الخدمات والبرامج، التحليل المالي، وخطة التسويق والعضويات.',
                'financial_metrics' => json_encode([
                    'فترة الاسترداد' => '2.9 سنة',
                    'صافي القيمة الحالية' => '980,000 ريال',
                    'معدل العائد الداخلي' => '38%',
                    'نقطة التعادل' => '20 شهر'
                ]),
                'status' => 1,
                'created_by' => $admin->id,
            ],
            [
                'title' => 'مصنع الأغذية الصحية',
                'description' => 'دراسة جدوى لإنشاء مصنع متخصص في إنتاج الأغذية الصحية والعضوية. المشروع يستهدف الأسر الواعية صحياً والمهتمة بالتغذية السليمة.',
                'image' => 'work-samples/healthy-food-factory.jpg',
                'money_capital' => '2000000',
                'rate_of_return' => '32',
                'services' => json_encode(['خطوط الإنتاج', 'ضمان الجودة', 'التوزيع والتسويق', 'البحث والتطوير']),
                'study_content' => 'تضمنت الدراسة تحليل سوق الأغذية الصحية، دراسة المتطلبات التقنية والتنظيمية، تحليل سلسلة التوريد، خطة الإنتاج والجودة، التحليل المالي المفصل، واستراتيجية التوزيع والتسويق.',
                'financial_metrics' => json_encode([
                    'فترة الاسترداد' => '3.8 سنة',
                    'صافي القيمة الحالية' => '2,400,000 ريال',
                    'معدل العائد الداخلي' => '32%',
                    'نقطة التعادل' => '28 شهر'
                ]),
                'status' => 1,
                'created_by' => $admin->id,
            ],
        ];

        foreach ($workSamples as $sample) {
            WorkSample::create($sample);
        }

        // إنشاء طلبات دراسة الجدوى
        $feasibilityRequests = [
            [
                'name' => 'سعد بن عبدالعزيز',
                'phone' => '+966555123456',
                'message' => 'أرغب في الحصول على دراسة جدوى لمشروع مركز تجاري صغير في منطقة سكنية. المشروع سيضم محلات تجارية متنوعة ومقهى.',
            ],
            [
                'name' => 'نورا بنت محمد',
                'phone' => '+966556789012',
                'message' => 'لدي فكرة لتطبيق توصيل طعام متخصص في الوجبات الصحية. أحتاج إلى دراسة جدوى شاملة تتضمن التحليل التقني والمالي.',
            ],
            [
                'name' => 'عبدالله الزهراني',
                'phone' => '+966557890123',
                'message' => 'أخطط لإنشاء مدرسة خاصة للتعليم المبكر. أحتاج إلى دراسة جدوى تشمل دراسة السوق والتحليل المالي والمتطلبات التنظيمية.',
            ],
            [
                'name' => 'ريم العتيبي',
                'phone' => '+966558901234',
                'message' => 'أرغب في الاستثمار في مجال التجميل والعناية الشخصية. هل يمكنكم إعداد دراسة جدوى لصالون تجميل متكامل؟',
            ],
        ];

        foreach ($feasibilityRequests as $request) {
            FeasibilityStudyRequest::create($request);
        }

        echo "تم إنشاء جميع البيانات بنجاح!\n";
        echo "تم إنشاء:\n";
        echo "- 5 فئات\n";
        echo "- " . count($staff) . " عضو فريق\n";
        echo "- " . count($partners) . " شريك نجاح\n";
        echo "- " . count($reviews) . " تقييم\n";
        echo "- " . count($services) . " خدمة\n";
        echo "- " . count($feasibilityStudies) . " دراسة جدوى\n";
        echo "- " . count($investmentOpportunities) . " فرصة استثمارية\n";
        echo "- " . count($faqs) . " سؤال شائع\n";
        echo "- " . count($posts) . " مقال\n";
        echo "- " . count($sliders) . " شريحة عرض\n";
        echo "- " . count($contacts) . " رسالة تواصل\n";
        echo "- " . count($workSamples) . " عينة عمل\n";
        echo "- " . count($feasibilityRequests) . " طلب دراسة جدوى\n";
    }
}