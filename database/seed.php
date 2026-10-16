<?php

// Data used to fill a new database (see app/core/Database.php).
// "services" are always inserted; everything else is demo content (HERAFY_SEED_DEMO=0 to skip it).
// Every demo account uses the password "herafy123".

return [
    'services' => [
        ['name' => 'سباك', 'slug' => 'plumber', 'image' => 'assets/IMAGES/services/service1.jpg'],
        ['name' => 'كهربائي', 'slug' => 'electrician', 'image' => 'assets/IMAGES/services/service2.jpg'],
        ['name' => 'نجار', 'slug' => 'carpenter', 'image' => 'assets/IMAGES/services/service3.jpg'],
        ['name' => 'دهان', 'slug' => 'painter', 'image' => 'assets/IMAGES/services/service4.jpg'],
        ['name' => 'بناء', 'slug' => 'mason', 'image' => 'assets/IMAGES/services/service5.jpg'],
        ['name' => 'لحام', 'slug' => 'welder', 'image' => 'assets/IMAGES/services/service6.jpg'],
        ['name' => 'حداد', 'slug' => 'blacksmith', 'image' => null],
        ['name' => 'بلاط', 'slug' => 'tiler', 'image' => null],
        ['name' => 'ميكانيكي', 'slug' => 'mechanic', 'image' => null],
        ['name' => 'بستاني', 'slug' => 'gardener', 'image' => null],
        ['name' => 'تكييف وتبريد', 'slug' => 'air-conditioning', 'image' => null],
        ['name' => 'خياط', 'slug' => 'tailor', 'image' => null],
    ],

    'craftsmen' => [
        ['first_name' => 'هواري', 'last_name' => 'بن عودة', 'email' => 'houari@herafy.dz', 'service' => 'carpenter', 'city' => 'وهران', 'phone' => '0550 11 22 33', 'bio' => 'نجار منذ 15 سنة، متخصص في المطابخ والأبواب الخشبية والأثاث حسب الطلب.', 'avatar' => 'assets/IMAGES/team/team1.jpg', 'cover' => 'assets/IMAGES/slider-pages/slide-page1.jpg', 'profile_views' => 41],
        ['first_name' => 'كريمة', 'last_name' => 'قدوري', 'email' => 'karima@herafy.dz', 'service' => 'painter', 'city' => 'الجزائر', 'phone' => '0551 22 33 44', 'bio' => 'دهان وديكور داخلي، ورق جدران وطلاء زخرفي للبيوت والمحلات.', 'avatar' => 'assets/IMAGES/team/team2.jpg', 'cover' => 'assets/IMAGES/slider-pages/slide-page2.jpg', 'profile_views' => 33],
        ['first_name' => 'قدور', 'last_name' => 'حمداني', 'email' => 'kadour@herafy.dz', 'service' => 'plumber', 'city' => 'قسنطينة', 'phone' => '0552 33 44 55', 'bio' => 'سباكة صحية، تركيب سخانات الماء والكشف عن التسربات.', 'avatar' => 'assets/IMAGES/team/team3.jpg', 'cover' => 'assets/IMAGES/slider-pages/slide-page3.jpg', 'profile_views' => 27],
        ['first_name' => 'حميدة', 'last_name' => 'بن عمر', 'email' => 'hamida@herafy.dz', 'service' => 'electrician', 'city' => 'سطيف', 'phone' => '0553 44 55 66', 'bio' => 'تركيبات كهربائية منزلية وصناعية، كاميرات مراقبة وأنظمة إنذار.', 'avatar' => 'assets/IMAGES/team/team4.jpg', 'cover' => 'assets/IMAGES/slider-pages/slide-page1.jpg', 'profile_views' => 19],
        ['first_name' => 'سفيان', 'last_name' => 'زروقي', 'email' => 'sofiane@herafy.dz', 'service' => 'mason', 'city' => 'تلمسان', 'phone' => '0554 55 66 77', 'bio' => 'أشغال البناء والترميم، الخرسانة المسلحة والواجهات.', 'avatar' => 'assets/IMAGES/team/team5.jpg', 'cover' => 'assets/IMAGES/slider-pages/slide-page2.jpg', 'profile_views' => 12],
        ['first_name' => 'ياسين', 'last_name' => 'مسعودي', 'email' => 'yacine@herafy.dz', 'service' => 'welder', 'city' => 'عنابة', 'phone' => '0555 66 77 88', 'bio' => 'لحام وتصنيع الأبواب والنوافذ الحديدية والدرابزين.', 'avatar' => 'assets/IMAGES/team/team6.jpg', 'cover' => 'assets/IMAGES/slider-pages/slide-page3.jpg', 'profile_views' => 8],
    ],

    'companies' => [
        ['name' => 'مواد البناء الجزائرية', 'email' => 'contact@materiaux.dz', 'city' => 'الجزائر', 'phone' => '021 00 11 22', 'website' => 'https://www.example.com', 'description' => 'توزيع الإسمنت، الحديد والمواد الأولية للبناء في كامل التراب الوطني.', 'logo' => 'assets/IMAGES/clients/client1.png', 'cover' => 'assets/IMAGES/banner/banner1.jpg'],
        ['name' => 'أدوات الحرفي', 'email' => 'info@outils.dz', 'city' => 'وهران', 'phone' => '041 00 11 22', 'website' => null, 'description' => 'معدات وأدوات كهربائية ويدوية للنجارين والحدادين والكهربائيين.', 'logo' => 'assets/IMAGES/clients/client2.png', 'cover' => 'assets/IMAGES/banner/banner2.jpg'],
        ['name' => 'دهانات الأطلس', 'email' => 'sales@atlas.dz', 'city' => 'سطيف', 'phone' => '036 00 11 22', 'website' => null, 'description' => 'دهانات داخلية وخارجية عالية الجودة صنعت في الجزائر.', 'logo' => 'assets/IMAGES/clients/client3.png', 'cover' => 'assets/IMAGES/banner/banner3.jpg'],
    ],

    'products' => [
        ['company_id' => 1, 'name' => 'إسمنت بورتلاندي 50 كغ', 'description' => 'إسمنت عالي المقاومة مناسب للخرسانة المسلحة.', 'price' => 950, 'image' => 'assets/IMAGES/projects/project5.jpg'],
        ['company_id' => 1, 'name' => 'حديد التسليح 12 مم', 'description' => 'قضبان حديد مطابقة للمعايير، تباع بالطن.', 'price' => 98000, 'image' => 'assets/IMAGES/projects/project6.jpg'],
        ['company_id' => 2, 'name' => 'منشار كهربائي دائري', 'description' => 'منشار 1800 واط للنجارة الدقيقة مع ضمان سنتين.', 'price' => 18500, 'image' => 'assets/IMAGES/services/service3.jpg'],
        ['company_id' => 2, 'name' => 'آلة لحام انفرتر', 'description' => 'آلة لحام خفيفة 200 أمبير.', 'price' => 27000, 'image' => 'assets/IMAGES/services/service6.jpg'],
        ['company_id' => 3, 'name' => 'دهان داخلي مطفي 25 كغ', 'description' => 'دهان مائي قابل للغسل بألوان متعددة.', 'price' => 6400, 'image' => 'assets/IMAGES/services/service4.jpg'],
    ],

    'posts' => [
        ['author_type' => 'account', 'author_id' => 1, 'body' => 'أنهينا اليوم تركيب مطبخ خشبي كامل لعائلة في حي السلام بوهران. الخشب من الزان الطبيعي.', 'image' => 'assets/IMAGES/projects/project1.jpg', 'created_at' => '-9 days'],
        ['author_type' => 'account', 'author_id' => 2, 'body' => 'تجديد صالون بالكامل: ورق جدران وطلاء زخرفي بلونين.', 'image' => 'assets/IMAGES/projects/project2.jpg', 'created_at' => '-7 days'],
        ['author_type' => 'account', 'author_id' => 3, 'body' => 'تركيب حمام كامل مع الكشف عن تسرب قديم تحت البلاط.', 'image' => 'assets/IMAGES/projects/project3.jpg', 'created_at' => '-5 days'],
        ['author_type' => 'company', 'author_id' => 2, 'body' => 'وصلت تشكيلة جديدة من المناشير الكهربائية، تخفيض 10% للحرفيين المسجلين في حرفي.', 'image' => null, 'created_at' => '-4 days'],
        ['author_type' => 'account', 'author_id' => 5, 'body' => 'ترميم واجهة منزل قديم في وسط مدينة تلمسان مع الحفاظ على الطابع التقليدي.', 'image' => 'assets/IMAGES/projects/project4.jpg', 'created_at' => '-3 days'],
        ['author_type' => 'account', 'author_id' => 4, 'body' => 'تركيب لوحة كهربائية جديدة ونظام إنارة LED لورشة.', 'image' => 'assets/IMAGES/post-image-3.png', 'created_at' => '-2 days'],
        ['author_type' => 'account', 'author_id' => 6, 'body' => 'درابزين حديدي مزخرف لدرج فيلا، تصميم وتنفيذ.', 'image' => 'assets/IMAGES/projects/project6.jpg', 'created_at' => '-1 days'],
    ],

    'sponsorships' => [
        ['company_id' => 2, 'account_id' => 1],
        ['company_id' => 3, 'account_id' => 2],
        ['company_id' => 1, 'account_id' => 5],
    ],
];
