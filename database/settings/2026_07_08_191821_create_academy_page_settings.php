<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('academy_page.hero', [
            'slides' => [
                [
                    'image' => null,
                    'alt' => 'Students at work',
                    'tag' => 'Individual Focus',
                    'title' => 'One to One classes. Serious results.',
                    'subtitle' => 'More feedback. More accountability. Better outcomes.',
                    'cta1_label' => 'View Batches',
                    'cta1_href' => '#offerings',
                    'cta2_label' => 'See the Gallery',
                    'cta2_href' => '#gallery',
                ],
                [
                    'image' => null,
                    'alt' => 'Qaabil Academy classroom',
                    'tag' => 'Now Enrolling',
                    'title' => 'Built to help Students Succeed.',
                    'subtitle' => 'Qaabil Academy is a physical learning centre built on the same values as the platform.',
                    'cta1_label' => 'Enrol Now',
                    'cta1_href' => 'route:contact',
                    'cta2_label' => 'Explore Courses',
                    'cta2_href' => '#offerings',
                ],
                [
                    'image' => null,
                    'alt' => 'Tutors teaching',
                    'tag' => 'Expert-Led · In-Person',
                    'title' => 'Taught by expert tutors',
                    'subtitle' => 'Every tutor at Qaabil Academy is an expert with proven track record.',
                    'cta1_label' => 'Meet the Tutors',
                    'cta1_href' => '#tutors',
                    'cta2_label' => 'Our Story',
                    'cta2_href' => '#about',
                ],
            ],
        ]);

        $this->migrator->add('academy_page.about', [
            'heading' => 'About Qaabil Academy',
            'title' => "Where personalised learning <em>takes shape.</em>",
            'description' => "<p>Qaabil Academy is the physical extension of Qaabil, an online learning platform founded by Mr. Zain — an education professional with 18 years of experience in the teaching and learning industry.</p><p>Located at Plaza Damas, Sri Hartamas, Kuala Lumpur, we focus on one-to-one classes because we believe individual attention produces the strongest results. Every student learns differently, so our approach is tailored to each learner's pace, ability, goals, and challenges.</p><p>We specialise in IGCSE and A Level programmes, while also supporting IB students and English Language learners. Students don't just attend lessons — they receive focused mentorship, structured guidance, and continuous accountability.</p>",
            'cta1_label' => 'Book a visit →',
            'cta1_href' => '#contact',
            'cta2_label' => 'See what we offer',
            'cta2_href' => '#offerings',
            'image_main' => null,
            'image_secondary' => null,
        ]);

        $this->migrator->add('academy_page.courses', [
            'heading' => 'What We Offer',
            'title' => "Courses that we offer for <em>One to One Classes</em>",
            'description' => '<p>One-to-one tutoring tailored to your syllabus, your pace, and your goals.</p>',
            'items' => [
                [
                    'title' => 'IGCSE',
                    'subtitle' => '',
                    'desc' => '',
                    'icon' => null,
                    'logo' => null,
                    'dark' => false,
                    'features' => ['Business Studies', 'Accounting', 'Economics', 'Mathematics', 'Additional Mathematics', 'Biology', 'Chemistry', 'Physics', 'Combined Science', 'Geography', 'History', 'ICT', 'Computer Science', 'Travel & Tourism', 'Sociology', 'Psychology', 'English', 'Spanish', 'Chinese', 'Malay'],
                    'cta_label' => 'Enquire →',
                    'cta_href' => 'route:contact',
                ],
                [
                    'title' => 'A Level',
                    'subtitle' => '',
                    'desc' => '',
                    'icon' => null,
                    'logo' => null,
                    'dark' => false,
                    'features' => ['Business', 'Accounting', 'Economics', 'Mathematics', 'Additional Mathematics', 'Biology', 'Chemistry', 'Physics', 'Geography', 'History', 'Sociology', 'Psychology', 'English', 'Chinese'],
                    'cta_label' => 'Enquire →',
                    'cta_href' => 'route:contact',
                ],
                [
                    'title' => 'IB',
                    'subtitle' => '',
                    'desc' => '',
                    'icon' => null,
                    'logo' => null,
                    'dark' => false,
                    'features' => ['Business Management', 'Economics', 'Mathematics', 'Biology', 'Chemistry', 'Physics', 'Geography', 'History', 'Psychology', 'English'],
                    'cta_label' => 'Enquire →',
                    'cta_href' => 'route:contact',
                ],
                [
                    'title' => 'English Language',
                    'subtitle' => '',
                    'desc' => 'Conversational fluency, academic writing, and exam preparation — structured to your current level and target goal.',
                    'icon' => '🗣️',
                    'logo' => null,
                    'dark' => false,
                    'features' => ['Cambridge English', 'Business English', 'IELTS', 'TOEFL', 'MUET'],
                    'cta_label' => 'Enquire →',
                    'cta_href' => 'route:contact',
                ],
                [
                    'title' => 'University Subjects',
                    'subtitle' => '',
                    'desc' => 'Support across core university-level coursework, from foundational theory to exam and assignment prep.',
                    'icon' => '🎓',
                    'logo' => null,
                    'dark' => false,
                    'features' => ['Financial Accounting', 'Management Accounting', 'Human Resource Management', 'Law', 'Audit', 'Taxation', 'Many others'],
                    'cta_label' => 'Enquire →',
                    'cta_href' => 'route:contact',
                ],
                [
                    'title' => 'Subjects on Demand',
                    'subtitle' => '',
                    'desc' => 'Many subjects and courses are available on demand and tailored to student needs.',
                    'icon' => '✨',
                    'logo' => null,
                    'dark' => false,
                    'features' => [],
                    'cta_label' => 'Enquire →',
                    'cta_href' => 'route:contact',
                ],
            ],
        ]);

        $this->migrator->add('academy_page.features', [
            'heading' => 'Why Choose Us',
            'title' => "Not just another <em>tuition centre.</em>",
            'description' => "Here's what actually makes us different from other tuition centres.",
            'items' => [
                ['icon' => '📘', 'title' => 'Exam Based Learning', 'description' => 'Our lessons are designed around exam requirements, marking schemes, past paper trends, and question-solving techniques so students know exactly how to approach their assessments with confidence.'],
                ['icon' => '🏆', 'title' => 'Proven Track Record', 'description' => 'Our tutors have helped produce numerous successful results through consistent guidance, structured preparation, and a strong understanding of what students need to perform well.'],
                ['icon' => '🎯', 'title' => 'Tailored Lessons', 'description' => 'Every student learns differently. Our tutors adapt lessons according to each learner\'s strengths, weaknesses, pace, and academic goals to make learning more effective.'],
                ['icon' => '💻', 'title' => 'Platform Access Included', 'description' => 'Every academy student receives access to the Qaabil online learning platform, allowing them to revise lessons, watch learning content, and continue studying beyond the classroom.'],
                ['icon' => '🚀', 'title' => '21st Century Learning Methods', 'description' => 'We combine traditional teaching with modern learning strategies such as active recall, visual learning, digital resources, project-based tasks, and practical application.'],
                ['icon' => '🏫', 'title' => 'Technology Equipped Classrooms', 'description' => 'Our classrooms are equipped with modern teaching tools to create a more engaging, interactive, and effective learning environment for students.'],
            ],
        ]);

        $this->migrator->add('academy_page.gallery', [
            'heading' => 'Gallery',
            'title' => "Life at <em>Qaabil Academy</em>",
            'images' => [
                ['image' => null, 'alt' => 'Workshop session'],
                ['image' => null, 'alt' => 'Students coding'],
                ['image' => null, 'alt' => 'Collaboration session'],
                ['image' => null, 'alt' => 'Team discussion'],
                ['image' => null, 'alt' => 'Classroom'],
                ['image' => null, 'alt' => 'Presentation day'],
                ['image' => null, 'alt' => 'Group project'],
                ['image' => null, 'alt' => 'Hands-on training'],
                ['image' => null, 'alt' => 'Peer mentoring'],
                ['image' => null, 'alt' => 'Code review'],
                ['image' => null, 'alt' => 'Graduation day'],
                ['image' => null, 'alt' => 'Industry visit'],
                ['image' => null, 'alt' => 'Networking event'],
            ],
        ]);

        $this->migrator->add('academy_page.tutors', [
            'heading' => 'Our Tutors',
            'title' => "Experts, <em>not just teachers.</em>",
            'items' => [
                ['avatar_image' => null, 'name' => 'Syed Zain', 'role' => 'Business, Economics & Accounting', 'bio' => 'Highly knowledgeable educator with 18 years of experience teaching Business Studies, Economics, Accounting, Finance, and Management from IGCSE/O-Level up to Master\u2019s degree level.', 'tags' => ['Business Studies', 'Economics', 'Accounting']],
                ['avatar_image' => null, 'name' => 'Anita', 'role' => 'English & English Literature', 'bio' => 'Highly experienced English and Literature educator with over 23 years of teaching experience across IGCSE, A-Level, IB, AP, and Australian curricula.', 'tags' => ['English', 'Literature', 'IGCSE / A-Level']],
                ['avatar_image' => null, 'name' => 'Hamdan', 'role' => 'Mathematics, Add Math & Statistics', 'bio' => 'Experienced Mathematics educator with 20+ years of teaching experience, known for clear explanations, structured lessons, and strong problem-solving support.', 'tags' => ['Mathematics', 'Add Math', 'Statistics']],
                ['avatar_image' => null, 'name' => 'Mahesvaran', 'role' => 'Science, Physics & Chemistry', 'bio' => 'Senior lecturer with over 20 years of experience teaching Physics, Chemistry, and Mathematics across IGCSE, IB, IBDP, and A-Level curricula.', 'tags' => ['Physics', 'Chemistry', 'Mathematics']],
                ['avatar_image' => null, 'name' => 'Mo', 'role' => 'English Communication', 'bio' => 'Dynamic English educator with over 10 years of experience, including leading international English immersion camps and helping students build confidence and communication skills.', 'tags' => ['English', 'Communication', 'A-Level']],
                ['avatar_image' => null, 'name' => 'Raheela', 'role' => 'Physics, Chemistry & Mathematics', 'bio' => 'PhD researcher in Electrical Engineering at the University of Malaya with 10 years of university-level academic teaching experience across science and technical subjects.', 'tags' => ['Physics', 'Chemistry', 'Mathematics']],
                ['avatar_image' => null, 'name' => 'Renu', 'role' => 'Bahasa Melayu', 'bio' => 'Passionate Bahasa Melayu educator with 13 years of teaching experience, helping students improve speaking, writing, comprehension, and overall language confidence.', 'tags' => ['Bahasa Melayu', 'Speaking', 'Writing']],
            ],
        ]);

        $this->migrator->add('academy_page.testimonials', [
            'items' => [
                ['avatar_image' => null, 'name' => 'Arman Dev', 'subject' => 'Business & Economics — CIMP', 'quote' => 'I\'ve been learning Business and Economics with Mr Zain for over a year now, and he always makes my learning experience interesting and engaging. His teaching style is very clear and he makes sure I end the class with full understanding. This has helped me consistently achieve scores above 80 in every exam.'],
                ['avatar_image' => null, 'name' => 'Zaina Ahamed', 'subject' => 'Business Studies — IGCSE', 'quote' => 'Mr Zain has been the most supportive teacher ever! He has helped me improve in business studies by a lot and I am very grateful for this achievement — all thanks to him!'],
                ['avatar_image' => null, 'name' => 'Kaamil Sayeed', 'subject' => 'Business Studies — IGCSE', 'quote' => 'Very nice environment and teachers. Mr Zain from business has got me from a D to an A in Business Studies IGCSE.'],
                ['avatar_image' => null, 'name' => 'Saifullah Sawban', 'subject' => 'Business & Economics — International Baccalaureate', 'quote' => 'I got 85% in my business exam after I enrolled with Mr Zain. He is highly recommended for Business and Economics.'],
                ['avatar_image' => null, 'name' => 'Dewi', 'subject' => 'Accounting — IGCSE', 'quote' => 'I started with zero knowledge, but Mr Zain explained everything clearly and made accounting feel easy. His notes and shortcuts were super helpful, and he genuinely cares about his students.'],
                ['avatar_image' => null, 'name' => 'Harith Abdillah', 'subject' => 'Economics — IGCSE', 'quote' => 'Mr Zain is the best economics teacher! He helped me understand the concepts of each section in the syllabus and prepared me to have confidence for the exam, while also using fun acronyms.'],
                ['avatar_image' => null, 'name' => 'Amrissh Soo', 'subject' => 'Accounting — IGCSE', 'quote' => 'Mr Zain helped me go from a barely pass in my mocks to an A* in my Accounting IGCSE in just 4 months. If it wasn\'t for him I would not have been able to get even close to this result!'],
            ],
        ]);

        $this->migrator->add('academy_page.manifesto', [
            'quote' => "The education centre is where the platform's philosophy gets a physical form.",
            'button_label' => 'Contact us →',
            'button_url' => 'route:contact',
            'whatsapp_url' => 'https://wa.me/601167424472',
            'whatsapp_label' => 'Ask on WhatsApp',
        ]);
    }
};
