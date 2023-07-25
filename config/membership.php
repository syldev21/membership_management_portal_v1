<?php

return [
    'registration_statuses'=>[
      'declined_members'=>[
          'id'=>0,
          'text'=>'Declined Registrations'
      ],
      'cell_group_registered'=>[
          'id'=>1,
          'text'=>'Application'
      ],
      'cell_group_approved'=>[
          'id'=>2,
          'text'=>'Prepared'
      ],
      'church_registered'=>[
          'id'=>3,
          'text'=>'Submitted'
      ],
      'church_provisionally_approved'=>[
          'id'=>4,
          'text'=>'Reviewed'
      ],
      'church_approved'=>[
          'id'=>5,
          'text'=>'Full Member'
      ],
    ],
    'delete_reason'=>[
        'death'=> [
            'text'=>'Death',
            'id'=>1
        ],
        'transfer'=> [
            'text'=>'Transfer',
            'id'=>2
        ],
        'no_mo_attending'=> [
            'text'=>'No longer attending our services',
            'id'=>3
        ],
    ],
    'decline_reason'=>[
        'pending_verification'=> [
            'text'=>'Pending Verification',
            'id'=>1
        ]
    ],
    'permissions'=>[
        'Add_Members'=>[
            'id'=>0,
            'text'=>'Add Members'
        ],
        'Assign_Role'=>[
            'id'=>1,
            'text'=>'Assign Role'
        ],
        'Decline_Membership'=>[
            'id'=>2,
            'text'=>'Decline Membership'
        ],
        'Delete_Members'=>[
            'id'=>3,
            'text'=>'Delete Members'
        ],
        'Edit_Members'=>[
            'id'=>4,
            'text'=>'Edit Members'
        ],
        'prepare_registration'=>[
            'id'=>5,
            'text'=>'Prepare Registration'
        ],
        'review_registration'=>[
            'id'=>6,
            'text'=>'Review Registration'
        ],
        'approve_registration'=>[
            'id'=>7,
            'text'=>'Approve Registration'
        ],
        'generate_report'=>[
            'id'=>8,
            'text'=>'Generate Report'
        ],
        'See_Members'=>[
            'id'=>9,
            'text'=>'See Members'
        ],


    ],'roles'=>[
        'admin'=>[
            'id'=>1,
            'text'=>'Admin'
        ],
        'view'=>[
            'id'=>2,
            'text'=>'View'
        ],
        'approver'=>[
            'id'=>3,
            'text'=>'Approver'
        ],
        'reviewer'=>[
            'id'=>4,
            'text'=>'Reviewer'
        ],
        'preparer'=>[
            'id'=>5,
            'text'=>'Preparer'
        ]

    ],
    'deactivate_reason'=>[

        'stopped'=> [
            'text'=>'Not a regular attendant',
            'id'=>1
        ],
    ],
    'cell_group' => [
        'kiambiu' => [
            'id' => 1,
            'text' => 'Kiambiu',

        ],
        'umoja_bethel' => [
            'id' => 2,
            'text' => 'Umoja-Bethel',

        ],
        'kariobangi_south' => [
            'id' => 3,
            'text' => 'Kariobangi South',

        ],
        'chokaa_berea' => [
            'id' => 4,
            'text' => 'Chokaa-Berea',

        ],"langata" => [
            'id' => 5,
            'text' => "Lang'ata",

        ],'Jericho' => [
            'id' => 6,
            'text' => "Jericho",

        ],
        'diaspora' => [
            'id' => 7,
            'text' => 'Diaspora',

        ],'not_sure'=>[
            'id' => 8,
            'text'=>'Not sure',

        ]
    ],
    'sub_county'=>[
        'ruaka'=>[
            'text'=>'Ruaka sub-county',
            'id'=>1,
            'wards'=>[
                'Utali'=>[
                    'text'=>'Utali',
                    'id'=>1,
                ],
                'Korogocho'=>[
                    'text'=>'Korogocho',
                    'id'=>2,
                ],
                'Lucky_Summer'=>[
                    'text'=>'Lucky Summer',
                    'id'=>3,
                ],
                'Mathare_North'=>[
                    'text'=>'Mathare North',
                    'id'=>4,
                ],
                'Baba_Dogo'=>[
                    'text'=>'Baba Dogo',
                    'id'=>5,
                ],

            ]
        ],
         'roysambu'=>[
            'text'=>'Roysambu sub-county',
            'id'=>2,
            'wards'=>[
                'Kawaha'=>[
                    'text'=>'Kawaha',
                    'id'=>1,
                ],
                'Roysambu'=>[
                    'text'=>'Roysambu',
                    'id'=>2,
                ],
                'Githurai'=>[
                    'text'=>'Githurai',
                    'id'=>3,
                ],
                'Zimmerman'=>[
                    'text'=>'Zimmerman',
                    'id'=>4,
                ],
                'Kahawa_West'=>[
                    'text'=>'Kahawa West',
                    'id'=>5,
                ],

            ]
        ],
         'kasarani'=>[
            'text'=>'Kasarani sub-county',
            'id'=>3,
            'wards'=>[
                'Kamulu'=>[
                    'text'=>'Kamulu',
                    'id'=>1,
                ],
                'Njiru'=>[
                    'text'=>'Njiru',
                    'id'=>2,
                ],
                'Clay_City'=>[
                    'text'=>'Clay City',
                    'id'=>3,
                ],
                'Mwiki'=>[
                    'text'=>'Mwiki',
                    'id'=>4,
                ],
                'Ruai'=>[
                    'text'=>'Ruai',
                    'id'=>5,
                ],

            ]
        ],
         'langata'=>[
            'text'=>"Lang'ata sub-county",
            'id'=>4,
            'wards'=>[
                'Nyayo_Rise'=>[
                    'text'=>'Nyayo Rise',
                    'id'=>1,
                ],
                'Nairobi_West'=>[
                    'text'=>'Nairobi West',
                    'id'=>2,
                ],
                'South_C'=>[
                    'text'=>'South C',
                    'id'=>3,
                ],
                'Karen'=>[
                    'text'=>'Karen',
                    'id'=>4,
                ],

            ]
        ],
         'embkakasi_central'=>[
            'text'=>'Embakasi Central sub-county',
            'id'=>5,
            'wards'=>[
                'Kayole_North'=>[
                    'text'=>'Kayole North',
                    'id'=>1,
                ],
                'Kayole_Central'=>[
                    'text'=>'Kayole Central',
                    'id'=>2,
                ],
                'Chokaa'=>[
                    'text'=>'Chokaa',
                    'id'=>3,
                ],
                'Komarocks'=>[
                    'text'=>'Komarocks',
                    'id'=>4,
                ],

            ]
        ],
         'dagoreti_south'=>[
            'text'=>'Dagoreti South sub-county',
            'id'=>6,
            'wards'=>[
                'Uthiru'=>[
                    'text'=>'Uthiru',
                    'id'=>1,
                ],
                'Waithaka'=>[
                    'text'=>'Waithaka',
                    'id'=>2,
                ],
                'Riruta'=>[
                    'text'=>'Riruta',
                    'id'=>3,
                ],
                'Ngando'=>[
                    'text'=>'Ngando',
                    'id'=>4,
                ],
                'Muti_ini'=>[
                    'text'=>'Muti-ini',
                    'id'=>5
                ],

            ]
        ],
        'dagoreti_north'=>[
            'text'=>'Dagoreti North sub-county',
            'id'=>7,
            'wards'=>[
                'Kwangware'=>[
                    'text'=>'Kwangware',
                    'id'=>1,
                ],
                'Kilimani'=>[
                    'text'=>'Kilimani',
                    'id'=>2,
                ],
                'Gatina'=>[
                    'text'=>'Gatina',
                    'id'=>3,
                ],
                'KIleleshwa'=>[
                    'text'=>'KIleleshwa',
                    'id'=>4,
                ],
                'Kabiro'=>[
                    'text'=>'Kabiro',
                    'id'=>5
                ],

            ]
        ],
         'westlands'=>[
            'text'=>'Westlands sub-county',
            'id'=>8,
            'wards'=>[
                'Karura'=>[
                    'text'=>'Karura',
                    'id'=>1,
                ],
                'Parklands'=>[
                    'text'=>'Parklands',
                    'id'=>2,
                ],
                'Kitisuru'=>[
                    'text'=>'Kitisuru',
                    'id'=>3,
                ],
                'Kangemi'=>[
                    'text'=>'Kangemi',
                    'id'=>4,
                ],
                'Mountain_View'=>[
                    'text'=>'Mountain View',
                    'id'=>5
                ],

            ]
        ],
         'embakasi_south'=>[
            'text'=>'Embakasi South sub-county',
            'id'=>9,
            'wards'=>[
                'Kwa_Njenga'=>[
                    'text'=>'Kwa Njenga',
                    'id'=>1,
                ],
                'Imara_Daima'=>[
                    'text'=>'Imara Daima',
                    'id'=>2,
                ],
                'Kware'=>[
                    'text'=>'Kware',
                    'id'=>3,
                ],
                'Kwa_Reuben'=>[
                    'text'=>'Kwa_Reuben',
                    'id'=>4,
                ],
                'Pipeline'=>[
                    'text'=>'Pipeline',
                    'id'=>5
                ],

            ]
        ],
        'embakasi_north'=>[
            'text'=>'Embakasi North sub-county',
            'id'=>10,
            'wards'=>[
                'Dandora_Area1'=>[
                    'text'=>'Dandora Area 1',
                    'id'=>1,
                ],
                'Dandora_Area2'=>[
                    'text'=>'Dandora Area 2',
                    'id'=>2,
                ],
                'Dandora_Area3'=>[
                    'text'=>'Dandora Area 3',
                    'id'=>3,
                ],
                'Dandora_Area4'=>[
                    'text'=>'Dandora Area 4',
                    'id'=>4,
                ],
                'kariobangi_north'=>[
                    'text'=>'Kariobangi North',
                    'id'=>5
                ],

            ]
        ],
         'kibra'=>[
            'text'=>'Kibra sub-county',
            'id'=>11,
            'wards'=>[
                'Woodley'=>[
                    'text'=>'Woodley',
                    'id'=>1,
                ],
                'Sarangombe'=>[
                    'text'=>"Sarang'ombe",
                    'id'=>2,
                ],
                'Makina'=>[
                    'text'=>'Makina',
                    'id'=>3,
                ],
                'Lindi'=>[
                    'text'=>'Lindi',
                    'id'=>4,
                ],
               'Laini_Saba'=>[
                    'text'=>'Laini Saba',
                    'id'=>5
                ],

            ]
        ],
         'embakasi_west'=>[
            'text'=>'Embakasi West sub-county',
            'id'=>12,
            'wards'=>[
                'Umoja_1'=>[
                    'text'=>'Umoja 1',
                    'id'=>1,
                ],
                'Umoja_2'=>[
                    'text'=>'Umoja 2',
                    'id'=>2,
                ],
                'Mowlem'=>[
                    'text'=>'Mowlem',
                    'id'=>3,
                ],
                'Kariobangi_South'=>[
                    'text'=>'Kariobangi South',
                    'id'=>4,
                ],

            ]
        ],
         'makadara'=>[
            'text'=>'Makadara sub-county',
            'id'=>13,
            'wards'=>[
                'maringo'=>[
                    'text'=>'maringo',
                    'id'=>1,
                ],
                'viwandani'=>[
                    'text'=>'viwandani',
                    'id'=>2,
                ],
                'harambee'=>[
                    'text'=>'harambee',
                    'id'=>3,
                ],
                'hamza'=>[
                    'text'=>'hamza',
                    'id'=>4,
                ],
                'makongeni'=>[
                    'text'=>'makongeni',
                    'id'=>5
                ],

            ]
        ],
         'kamkunji'=>[
            'text'=>'Kamkunji sub-county',
            'id'=>14,
            'wards'=>[
                'Eastleigh_North'=>[
                    'text'=>'Eastleigh North',
                    'id'=>1,
                ],
                'Eastleigh_South'=>[
                    'text'=>'Eastleigh South',
                    'id'=>2,
                ],
                'PUmwani'=>[
                    'text'=>'PUmwani',
                    'id'=>3,
                ],
                'Airbase'=>[
                    'text'=>'Airbase',
                    'id'=>4,
                ],
                'California'=>[
                    'text'=>'California',
                    'id'=>5
                ],

            ]
        ],
         'starehe'=>[
            'text'=>'Starehe sub-county',
            'id'=>15,
            'wards'=>[
                'Nairobi_South'=>[
                    'text'=>'Nairobi South',
                    'id'=>1,
                ],
                'Nairobi_North'=>[
                    'text'=>'Nairobi North',
                    'id'=>2,
                ],
                'Ngara'=>[
                    'text'=>'Ngara',
                    'id'=>3,
                ],
                'Pangani'=>[
                    'text'=>'Pangani',
                    'id'=>4,
                ],
                'Landimawe'=>[
                    'text'=>'Landimawe',
                    'id'=>5,
                ],
                'Ziwani'=>[
                    'text'=>'Ziwani',
                    'id'=>6
                ],

            ]
        ],
         'mathare'=>[
            'text'=>'Mathare sub-county',
            'id'=>16,
            'wards'=>[
                'Malango_Kubwa'=>[
                    'text'=>'Malango Kubwa',
                    'id'=>1,
                ],
                'Kiamaiko'=>[
                    'text'=>'Kiamaiko',
                    'id'=>2,
                ],
                'Ngei'=>[
                    'text'=>'Ngei',
                    'id'=>3,
                ],
                'Huruma'=>[
                    'text'=>'Huruma',
                    'id'=>4,
                ],
                'Mbatini'=>[
                    'text'=>'Mbatini',
                    'id'=>5,
                ],

            ]
        ],
         'embakasi_east'=>[
            'text'=>'Embakasi East sub-county',
            'id'=>17,
            'wards'=>[
                'Utawala'=>[
                    'text'=>'Utawala',
                    'id'=>1,
                ],
                'Upper_Savanna'=>[
                    'text'=>'Upper Savanna',
                    'id'=>2,
                ],
                'Lower_Savanna'=>[
                    'text'=>'Lower Savanna',
                    'id'=>3,
                ],
                'Embakasi'=>[
                    'text'=>'Embakasi',
                    'id'=>4,
                ],
                'Mihango'=>[
                    'text'=>"Mihang'o",
                    'id'=>5,
                ],

            ]
        ],

         'other_areas'=>[
            'text'=>'Other Areas',
            'id'=>18,
            'wards'=>[
                'Katani'=>[
                    'text'=>'Katani',
                    'id'=>1,
                ],
                'Syokimau'=>[
                    'text'=>'Syokimau',
                    'id'=>2,
                ],
                'athi_river'=>[
                    'text'=>'Athi River',
                    'id'=>3,
                ],
                'kitengela'=>[
                    'text'=>'Kitengela',
                    'id'=>4,
                ],
                'diaspora'=>[
                    'text'=>'Diaspora',
                    'id'=>6,
                ],

            ]
        ],

    ],
    'gender' => [
        'male' => [
            'text' => 'Male',
            'id' => 1,
        ],
        'female' => [
            'text' => 'Female',
            'id' => 2,
        ],
    ],

    'flag' => [
        'yes' => [
            'text' => 'Yes',
            'id' => 1
        ],
        'no' => [
            'text' => 'No',
            'id' => 2
        ]
    ],

    'marital_status' => [
        'married' => [
            'text' => 'Married',
            'id' => 1
        ],
        'single' => [
            'text' => 'Single',
            'id' => 2
        ],
        'divorced' => [
            'text' => 'Divorced',
            'id' => 3
        ],
        'widow' => [
            'text' => 'Widow',
            'id' => 4
        ],
        'widower' => [
            'text' => 'Widower',
            'id' => 5
        ]
    ],

    'employment_status' => [
        'employed' => [
            'text' => 'Employed',
            'id' => '1'
        ],
        'unemployed' => [
            'text' => 'Unemployed',
            'id' => '2'
        ],
        'business' => [
            'text' => 'Self-Employed',
            'id' => '3'
        ]
    ],

    'occupation' => [
        'finance' => [
            'text' => 'Accounting and Finance',
            'id' => '1'
        ],
        'it' => [
            'text' => 'Information Technology',
            'id' => '2'
        ],
        'education' => [
            'text' => 'Education',
            'id' => '3'
        ],
        'business' => [
            'text' => 'Business',
            'id' => '4'
        ]
    ],

    'level_of_education' => [
        'ecd' => [
            'text' => 'ECD',
            'id' => '0'
        ],'primary' => [
            'text' => 'Primary School',
            'id' => '1'
        ],
        'high_school' => [
            'text' => 'Secondary School/ O Level',
            'id' => '2'
        ],
        'diploma' => [
            'text' => 'Post Secondary/Tertiary',
            'id' => '3'
        ]
    ],
    'ministry' => [
        'welfare'=>[
            'id'=>1,
            'text'=>'Welfare Department'
        ],
        'hospitality'=>[
            'id'=>2,
            'text'=>'Hospitality Department'
        ],
        'protocol'=>[
            'id'=>3,
            'text'=>'Protocol & Public Relations Department'
        ],
        'evangelism'=>[
            'id'=>4,
            'text'=>'Evangelism Department'
        ],
        'discipleship'=>[
            'id'=>5,
            'text'=>'Discipleship Department'
        ],
        'counselling'=>[
            'id'=>6,
            'text'=>'Counselling Department'
        ],
        'development'=>[
            'id'=>7,
            'text'=>'Development & Enterprise Department'
        ],
        'finance'=>[
            'id'=>8,
            'text'=>'Finance & Administration Department'
        ],
        'women'=>[
            'id'=>9,
            'text'=>'Women Department'
        ],
        'ict'=>[
            'id'=>10,
            'text'=>'Information & Communication Technology Department'
        ],
        'youth'=>[
            'id'=>11,
            'text'=>'Youth & Juvenile Department'
        ],
        'music'=>[
            'id'=>12,
            'text'=>'Music Department'
        ],
        'men'=>[
            'id'=>13,
            'text'=>"Men's Fellowship"
        ],
        'strategy'=>[
            'id'=>14,
            'text'=>'Strategy, Monitoring & Evaluation Unit'
        ],
        'audit'=>[
            'id'=>15,
            'text'=>'Audit, Risk & Compliance UNit'
        ]
    ],
    'age_clusters'=>[
        'All_members'=>[
            'id'=>0,
            'text'=>'All Members'
        ],
        'stage1'=>[
            'start'=>0,
            'end'=>4,
            'id'=>1,
            'text'=>'Stage 1'
        ],'stage2'=>[
            'start'=>5,
            'end'=>9,
            'id'=>2,
            'text'=>'Stage 2'
        ],'stage3'=>[
            'start'=>10,
            'end'=>14,
            'id'=>3,
            'text'=>'Stage 3'
        ],'stage4'=>[
            'start'=>15,
            'end'=>19,
            'id'=>4,
            'text'=>'Stage 4'
        ]
        ,'stage5'=>[
            'start'=>20,
            'end'=>24,
            'id'=>5,
            'text'=>'Stage 5'
        ]
        ,'stage6'=>[
            'start'=>25,
            'end'=>29,
            'id'=>6,
            'text'=>'Stage 6'
        ]
        ,'stage7'=>[
            'start'=>30,
            'end'=>34,
            'id'=>7,
            'text'=>'Stage 7'
        ]
        ,'stage8'=>[
            'start'=>35,
            'end'=>39,
            'id'=>8,
            'text'=>'Stage 8'
        ]
        ,'stage9'=>[
            'start'=>40,
            'end'=>44,
            'id'=>9,
            'text'=>'Stage 9'
        ]
        ,'stage10'=>[
            'start'=>45,
            'end'=>49,
            'id'=>10,
            'text'=>'Stage 10'
        ]
        ,'stage11'=>[
            'start'=>50,
            'end'=>54,
            'id'=>11,
            'text'=>'Stage 11'
        ]
        ,'stage12'=>[
            'start'=>55,
            'end'=>59,
            'id'=>12,
            'text'=>'Stage 12'
        ]
        ,'stage13'=>[
            'start'=>60,
            'end'=>64,
            'id'=>13,
            'text'=>'Stage 13'
        ]
        ,'stage14'=>[
            'start'=>65,
            'end'=>69,
            'id'=>14,
            'text'=>'Stage 14'
        ]
        ,'stage15'=>[
            'start'=>70,
            'end'=>74,
            'id'=>15,
            'text'=>'Stage 15'
        ]
        ,'stage16'=>[
            'start'=>75,
            'end'=>79,
            'id'=>16,
            'text'=>'Stage 16'
        ]
        ,'stage17'=>[
            'start'=>80,
            'id'=>17,
            'text'=>'Stage 17'
        ]
    ],

    'title'=>[
      'bishop'=>[
          'text'=>'Bishop',
          'id'=>1
      ],
      'aux_bishop'=>[
          'text'=>'Aux. Bishop',
          'id'=>2
      ],
      'pastor_in_charge'=>[
          'text'=>'Pastor in Charge',
          'id'=>3
      ],
      'reverend'=>[
          'text'=>'Reverend',
          'id'=>4
      ],
      'apostle'=>[
          'text'=>'Apostle',
          'id'=>5
      ],
      'evangelist'=>[
          'text'=>'Evangelist',
          'id'=>6
      ],
      'pastor'=>[
          'text'=>'Pastor',
          'id'=>7
      ],
      'member'=>[
          'text'=>'Member',
          'id'=>8
      ],
      'elder'=>[
          'text'=>'Elder',
          'id'=>9
      ],
      'deacon'=>[
          'text'=>'Deacon',
          'id'=>10
      ],
      'admin'=>[
          'text'=>'Admin',
          'id'=>11
      ],
    ],

    "LATER_DATE"=>[
        "message"=>"Date of birth cannot be later than today"
    ],


    'statuses'=>[
        'deactivate_reason'=>[

            1=> [
                'text'=>'Not a regular attendant',
                'id'=>1
            ],
        ],
        'delete_reason'=>[
            1=> [
                'text'=>'Death',
                'id'=>1
            ],
            2=> [
                'text'=>'Transfer',
                'id'=>2
            ],
            3=> [
                'text'=>'No longer attending our services',
                'id'=>3
            ],
        ],
        'roles'=>[
            1=>[
                'id'=>1,
                'text'=>'Admin'
            ],
            2=>[
                'id'=>2,
                'text'=>'View'
            ],
            3=>[
                'id'=>3,
                'text'=>'Approver'
            ],
            4=>[
                'id'=>4,
                'text'=>'Reviewer'
            ],
            5=>[
                'id'=>5,
                'text'=>'Preparer'
            ]

        ],
        'title'=>[
            1=>[
                'text'=>'Bishop',
                'id'=>1
            ],
            2=>[
                'text'=>'Aux. Bishop',
                'id'=>2
            ],
            3=>[
                'text'=>'Pastor in Charge',
                'id'=>3
            ],
            4=>[
                'text'=>'Reverend',
                'id'=>4
            ],
            5=>[
                'text'=>'Apostle',
                'id'=>5
            ],
            6=>[
                'text'=>'Evangelist',
                'id'=>6
            ],
            7=>[
                'text'=>'Pastor',
                'id'=>7
            ],
            8=>[
                'text'=>'Member',
                'id'=>8
            ],
            9=>[
                'text'=>'Elder',
                'id'=>9
            ],
            10=>[
                'text'=>'Deacon',
                'id'=>10
            ],
            11=>[
                'text'=>'Admin',
                'id'=>11
            ],
        ],
        'decline_reason'=>[
            1=> [
                'text'=>'Pending Verification',
                'id'=>1
            ]
        ],
        'registration_statuses'=>[
            0=>[
                'id'=>0,
                'text'=>'Declined Registrations'
            ],
            1=>[
                'id'=>1,
                'text'=>'Application'
            ],
            2=>[
                'id'=>2,
                'text'=>'Prepared'
            ],
            3=>[
                'id'=>3,
                'text'=>'Submitted'
            ],
            4=>[
                'id'=>4,
                'text'=>'Reviewed'
            ],
            5=>[
                'id'=>5,
                'text'=>'Full Member'
            ],
        ],
       'sub_county'=>[
            1=>[
                'text'=>'Ruaka sub-county',
                'wards'=>[
                    1=>
                        ['id'=>1,
                        'text'=>'Utali'
                        ],
                    2=>
                        ['id'=>2,
                        'text'=>'Korogocho'
                        ],
                    3=>
                        ['id'=>3,
                        'text'=>'Lucky Summer'
                        ],
                    4=>
                        ['id'=>4,
                        'text'=>"Mathare North"
                        ],
                    5=>
                        ['id'=>5,
                        'text'=>"Baba Dogo"
                        ]
                ]
            ],
            2=>[
                'text'=>'Roysambu sub-county',
                'wards'=>[
                    1=>
                       [
                           'id'=>1,
                           'text'=>'Kawaha',
                       ] ,
                    2=>
                       [
                           'id'=>2,
                           'text'=>'Roysambu',
                       ] ,
                    3=>
                       [
                           'id'=>3,
                           'text'=>'Githurai',
                       ],
                    4=>
                       [
                           'id'=>4,
                           'text'=>"Zimmerman",
                       ],
                    5=>
                       [
                           'id'=>5,
                           'text'=>"Kahawa West"
                       ]
                ]
            ],
            3=>[
                'text'=>'Kasarani sub-county',
                'wards'=>[
                    1=>[
                        'id'=>1,
                        'text'=>'Kamulu'],
                    2=>[
                        'id'=>2,
                        'text'=>'Njiru'],
                    3=>[
                        'id'=>3,
                        'text'=>'Clay City'],
                    4=>[
                        'id'=>4,
                        'text'=>"Ruai"],
                    5=>[
                        'id'=>5,
                        'text'=>"Ruai"]
                ]
            ],
            4=>[
                'text'=>"Lang'ata sub-county",
                'wards'=>[
                    1=>['id'=>1,
                        'text'=>'Nyayo Rise'],
                    2=>['id'=>2,
                        'text'=>'Nairobi West'],
                    3=>['id'=>3,
                        'text'=>'Chokaa'],
                    4=>['id'=>4,
                        'text'=>"Karen"]
                ]
            ],
            5=>[
                'text'=>'Embakasi Central sub-county',
                'wards'=>[
                    1=>[
                        'id'=>1,
                        'text'=> 'Kayole North'],
                    2=>[
                        'id'=>2,
                        'text'=> 'Kayole Central'],
                    3=>[
                        'id'=>3,
                        'text'=> 'South C'],
                    4=>[
                        'id'=>4,
                        'text'=> 'Komarocks']
                ]
            ],
            6=>[
                'text'=>'Dagoreti South sub-county',
                'wards'=>[
                    1=>[
                        'id'=>1,
                        'text'=>'Uthiru'],
                    2=>[
                        'id'=>2,
                        'text'=>'Waithaka'],
                    3=>[
                        'id'=>3,
                        'text'=>'Riruta'],
                    4=>[
                        'id'=>4,
                        'text'=>"Ngando"],
                    5=>[
                        'id'=>5,
                        'text'=>"Muti-ini"],
                ]
            ],
            7=>[
                'text'=>'Dagoreti North sub-county',
                'wards'=>[
                    1=>[
                        'id'=>1,
                        'text'=>'Kawangware'
                        ],
                    2=>[
                        'id'=>2,
                        'text'=>'Kilimani'
                        ],
                    3=>[
                        'id'=>3,
                        'text'=>'Gatina'
                        ],
                    4=>[
                        'id'=>4,
                        'text'=>"Kileleshwa"
                        ],
                    5=>[
                        'id'=>5,
                        'text'=>"Kabiro"
                        ],
                ]
            ],
           8=>[
               'id'=>8,
               'text'=>'Westlands sub-county',
                'wards'=>[
                    1=>[
                        'id'=>1,
                        'text'=>'Karura'],
                    2=>[
                        'id'=>2,
                        'text'=>'Parklands'],
                    3=>[
                        'id'=>3,
                        'text'=>'Kitisuru'],
                    4=>[
                        'id'=>4,
                        'text'=>"Kangemi"],
                    5=>[
                        'id'=>5,
                        'text'=>"Mountain View"],
                ]
            ],
            9=>[
                'text'=>'Embakasi South sub-county',
                'wards'=>[
                    1=>[
                        'id'=>1,
                        'text'=>'Kwa Njenga'],
                    2=>[
                        'id'=>2,
                        'text'=>'Imara Daima'],
                    3=>[
                        'id'=>3,
                        'text'=>'Kware'],
                    4=>[
                        'id'=>4,
                        'text'=>"Kwa Reuben"],
                    5=>[
                        'id'=>5,
                        'text'=>"Pipeline"],
                ]
            ],
            10=>[
                'text'=>'Embakasi North sub-county',
                'wards'=>[
                    1=>[
                        'id'=>1,
                        'text'=>'Dandora Area 1'],
                    2=>[
                        'id'=>2,
                        'text'=>'Dandora Area 2'],
                    3=>[
                        'id'=>3,
                        'text'=>'Dandora Area 3'],
                    4=>[
                        'id'=>4,
                        'text'=>"Dandora Area 4"],
                    5=>[
                        'id'=>5,
                        'text'=>"Kariobangi North"]
                ]
            ],
            11=>[
                'text'=>'Kibra sub-county',
                'wards'=>[
                        1=>[
                            'id'=>1,
                            'text'=>'Woodley'],
                        2=>[
                            'id'=>2,
                            'text'=>"Sarang'ombe"],
                        3=>[
                            'id'=>3,
                            'text'=>'Makina'],
                        4=>[
                            'id'=>4,
                            'text'=>"Lindi"],
                        5=>[
                            'id'=>5,
                            'text'=>"Laini Saba"]
                    ]
                ],
            12=>[
                'text'=>'Embakasi West sub-county',
                'wards'=>[
                        1=>[
                            'id'=>1,
                            'text'=>'Umoja 1'],
                        2=>[
                            'id'=>2,
                            'text'=>'Umoja 2'],
                        3=>[
                            'id'=>3,
                            'text'=>'Mowlem'],
                        4=>[
                            'id'=>4,
                            'text'=>"Kariobangi South"],
                    ],
                ],
            13=>[
                'text'=>'Makadara sub-county',
                'wards'=>[
                        1=>[
                            'id'=>1,
                            'text'=>'Maringo'
                            ],
                        2=>[
                            'id'=>2,
                            'text'=>'Viwandani'
                            ],
                        3=>[
                            'id'=>3,
                            'text'=>'Harambee'
                            ],
                        4=>[
                            'id'=>4,
                            'text'=>"Hamza"
                            ],
                        5=>[
                            'id'=>5,
                            'text'=>"Makongeni"
                            ]
                    ],
                ],
            14=>[
                'text'=>'Kamkunji sub-county',
                'wards'=>[
                        1=>[
                            'id'=>1,
                            'text'=>'Eastleigh South'],
                        2=>[
                            'id'=>2,
                            'text'=>'Eastleigh South'],
                        3=>[
                            'id'=>3,
                            'text'=>'Pumwani'],
                        4=>[
                            'id'=>4,
                            'text'=>"Airbase"],
                        5=>[
                            'id'=>5,
                            'text'=>"California"]
                    ],
                ],
            15=>[
                'text'=>'Starehe sub-county',
                'wards'=>[
                        1=>[
                            'id'=>1,
                            'text'=>'Nairobi South'],
                        2=>[
                            'id'=>2,
                            'text'=>'Nairobi North'],
                        3=>[
                            'id'=>3,
                            'text'=>'Ngara'],
                        4=>[
                            'id'=>4,
                            'text'=>'Pangani'],
                        5=>[
                            'id'=>5,
                            'text'=>"Landimawe"],
                        6=>[
                            'id'=>6,
                            'text'=>"Ziwani"]
                    ],
                ],
           16=>[
               'id'=>16,
               'text'=>'Mathare sub-county',
                'wards'=>[
                        1=>[
                            'id'=>1,
                            'text'=>'Malango Kubwa'
                        ],
                        2=>[
                            'id'=>2,
                            'text'=>'Kiamaiko'
                        ],
                        3=>[
                            'id'=>3,
                            'text'=>'Ngei'
                        ],
                        4=>[
                            'id'=>4,
                            'text'=>'Huruma'
                        ],
                        5=>[
                            'id'=>5,
                            'text'=>"Mbatini"
                        ]
                    ],
                ],
           17=>[
               'text'=>'Embakasi East sub-county',
                'wards'=>[
                        1=>[
                            'id'=>1,
                            'text'=>'Utawala'],
                        2=>[
                            'id'=>2,
                            'text'=>'Upper Savanna'],
                        3=>[
                            'id'=>3,
                            'text'=>'Lower Savanna'],
                        4=>[
                            'id'=>4,
                            'text'=>'Embakasi'],
                        5=>[
                            'id'=>5,
                            'text'=>"Mihang'o"],
                    ],
                ],
           18=>[
               'text'=>'Other Areas',
                'wards'=>[
                        1=>[
                            'id'=>1,
                            'text'=>'Katani'],
                        2=>[
                            'id'=>2,
                            'text'=>'Syokimau'],
                        3=>[
                            'id'=>3,
                            'text'=>'Athi River'],
                        4=>[
                            'id'=>4,
                            'text'=>'Kitengela'],
                        5=>[
                            'id'=>5,
                            'text'=>'Diaspora'],
                    ],
                ],
            ],
        'cell_group' => [
            1 =>'Kiambiu',
            2 =>'Umoja-Bethel',
            3 =>'Kariobangi South',
            4 =>'Chokaa-Berea',
            5 =>"Lang'ata",
            6 =>"Jericho",
            7 =>'Diaspora',
            8 =>"Not Sure",
        ],
        'gender' => [
            1 =>'Male',
            2 =>'Female',
        ],

        'flag' => [
            1 =>'Yes',

            2 =>'No',

        ],

        'marital_status' => [
            1 =>'Married',

            2 =>'Single',

            3 =>'Divorced',

            4 =>'Widow',

            5 =>'Widower',

        ],

        'employment_status' => [
            1 =>'Employed',

            2 =>'Unemployed',

            3 =>'Self-Employed'
        ],

        'occupation' => [
            1 =>'Accounting and Finance',

            2 =>'Information Technology',

            3 =>'Education',

            4 =>'Business',
        ],

        'level_of_education' => [
            0 =>'ECD',

            1 =>'Primary School',

            2 =>'Secondary School/ O Level',

            3 =>'Post Secondary/ Tertiary',

        ],
        'ministry' => [
            1=>'Welfare Department'
            ,
            2=>'Hospitality Department'
            ,
            3=>'Protocol & Public Relations Department'
            ,
            4=>'Evangelism Department'
            ,
            5=>'Discipleship Department'
            ,
            6=>'Counselling Department'
            ,
            7=>'Development & Enterprise Department'
            ,
            8=>'Finance & Administration Department'
            ,
            9=>'Women Department'
            ,
            10=>'Information & Communication Technology Department',
            11=>'Youth & Juvenile Department',
            12=>'Music Department',
            13=>"Men's Fellowship",
            14=>'Strategy, Monitoring & Evaluation Unit',
            15=>'Audit, Risk & Compliance Unit'
        ],
        'age_clusters'=>[
            0=>[
                'id'=>0,
                'text'=>'All Members'
            ],
            1=>[
                'start'=>0,
                'end'=>4,
                'id'=>1,
                'text'=>'Stage 1'
            ],2=>[
                'start'=>5,
                'end'=>9,
                'id'=>2,
                'text'=>'Stage 2'
            ],3=>[
                'start'=>10,
                'end'=>14,
                'id'=>3,
                'text'=>'Stage 3'
            ],4=>[
                'start'=>15,
                'end'=>19,
                'id'=>4,
                'text'=>'Stage 4'
            ]
            ,5=>[
                'start'=>20,
                'end'=>24,
                'id'=>5,
                'text'=>'Stage 5'
            ]
            ,6=>[
                'start'=>24,
                'end'=>25,
                'id'=>6,
                'text'=>'Stage 6'
            ]
            ,7=>[
                'start'=>30,
                'end'=>34,
                'id'=>7,
                'text'=>'Stage 7'
            ]
            ,8=>[
                'start'=>35,
                'end'=>39,
                'id'=>8,
                'text'=>'Stage 8'
            ]
            ,9=>[
                'start'=>40,
                'end'=>44,
                'id'=>9,
                'text'=>'Stage 9'
            ]
            ,10=>[
                'start'=>45,
                'end'=>49,
                'id'=>10,
                'text'=>'Stage 10'
            ]
            ,11=>[
                'start'=>50,
                'end'=>54,
                'id'=>11,
                'text'=>'Stage 11'
            ]
            ,12=>[
                'start'=>55,
                'end'=>59,
                'id'=>12,
                'text'=>'Stage 12'
            ]
            ,13=>[
                'start'=>60,
                'end'=>64,
                'id'=>13,
                'text'=>'Stage 13'
            ]
            ,14=>[
                'start'=>65,
                'end'=>69,
                'id'=>14,
                'text'=>'Stage 14'
            ]
            ,15=>[
                'start'=>70,
                'end'=>74,
                'id'=>15,
                'text'=>'Stage 15'
            ]
            ,16=>[
                'start'=>75,
                'end'=>79,
                'id'=>16,
                'text'=>'Stage 16'
            ]
            ,17=>[
                'start'=>80,
                'id'=>17,
                'text'=>'Stage 17'
            ]
        ],
        ],
];
