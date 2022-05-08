<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use  App\Http\Api\GoogleApis;
use App\Http\Controllers\DeliveryRouteController;
use Illuminate\Http\Request;
use Tests\TestCase;

class DeliveryRouteControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_sholdReturnSuccess()
    {
        //arrange
        $response = [
            "geocoded_waypoints" => [
                [
                    "geocoder_status" => "OK",
                    "place_id" => "ChIJT0PVVFbQpgARkzHf7_73KEI",
                    "types" => [
                        "postal_code"
                    ]
                ],
                [
                    "geocoder_status" => "OK",
                    "place_id" => "ChIJQcqGaqTWpgARN5OKp4oyKGY",
                    "types" => [
                        "postal_code"
                    ]
                ]
            ],
            "routes" => [
                [
                    "bounds" => [
                        "northeast" => [
                            "lat" => -20.0422706,
                            "lng" => -44.2569349
                        ],
                        "southwest" => [
                            "lat" => -20.0854471,
                            "lng" => -44.3562924
                        ]
                    ],
                    "copyrights" => "Map data ©2022",
                    "legs" => [
                        [
                            "distance" => [
                                "text" => "18.0 km",
                                "value" => 17962
                            ],
                            "duration" => [
                                "text" => "38 mins",
                                "value" => 2255
                            ],
                            "end_address" => "Igarapé - State of Minas Gerais, 32900-000, Brazil",
                            "end_location" => [
                                "lat" => -20.0656116,
                                "lng" => -44.34456249999999
                            ],
                            "start_address" => "São Joaquim de Bicas - State of Minas Gerais, 32920-000, Brazil",
                            "start_location" => [
                                "lat" => -20.0648258,
                                "lng" => -44.2576031
                            ],
                            "steps" => [
                                [
                                    "distance" => [
                                        "text" => "0.2 km",
                                        "value" => 214
                                    ],
                                    "duration" => [
                                        "text" => "1 min",
                                        "value" => 33
                                    ],
                                    "end_location" => [
                                        "lat" => -20.0629054,
                                        "lng" => -44.2576257
                                    ],
                                    "html_instructions" => "Head <b>north</b> on <b>R. Lavras</b> toward <b>R. Geraldo Freitas Campos</b>",
                                    "polyline" => [
                                        "points" => "d|myB~`cmGm@?yA@a@?g@@_@?mC@"
                                    ],
                                    "start_location" => [
                                        "lat" => -20.0648258,
                                        "lng" => -44.2576031
                                    ],
                                    "travel_mode" => "DRIVING"
                                ],
                                [
                                    "distance" => [
                                        "text" => "72 m",
                                        "value" => 72
                                    ],
                                    "duration" => [
                                        "text" => "1 min",
                                        "value" => 25
                                    ],
                                    "end_location" => [
                                        "lat" => -20.0629003,
                                        "lng" => -44.2569349
                                    ],
                                    "html_instructions" => "Turn <b>right</b> at the 1st cross street onto <b>R. Geraldo Freitas Campos</b>",
                                    "maneuver" => "turn-right",
                                    "polyline" => [
                                        "points" => "dpmyBdacmGAkC"
                                    ],
                                    "start_location" => [
                                        "lat" => -20.0629054,
                                        "lng" => -44.2576257
                                    ],
                                    "travel_mode" => "DRIVING"
                                ],
                                [
                                    "distance" => [
                                        "text" => "0.6 km",
                                        "value" => 615
                                    ],
                                    "duration" => [
                                        "text" => "2 mins",
                                        "value" => 103
                                    ],
                                    "end_location" => [
                                        "lat" => -20.0573765,
                                        "lng" => -44.25704959999999
                                    ],
                                    "html_instructions" => "Turn <b>left</b> at the 1st cross street onto <b>R. Igarapé</b>",
                                    "maneuver" => "turn-left",
                                    "polyline" => [
                                        "points" => "bpmyBx|bmGa@@c@?c@?_@?g@?c@@eA?qC@wC?uBByB@s@?K?cA@G?m@AQ@S?S@O@K@IB"
                                    ],
                                    "start_location" => [
                                        "lat" => -20.0629003,
                                        "lng" => -44.2569349
                                    ],
                                    "travel_mode" => "DRIVING"
                                ],
                                [
                                    "distance" => [
                                        "text" => "1.9 km",
                                        "value" => 1900
                                    ],
                                    "duration" => [
                                        "text" => "5 mins",
                                        "value" => 285
                                    ],
                                    "end_location" => [
                                        "lat" => -20.0422706,
                                        "lng" => -44.2643622
                                    ],
                                    "html_instructions" => "Continue onto <b>R. José Gabriel de Rezende</b>",
                                    "polyline" => [
                                        "points" => "rmlyBp]bmGe@Na@LuAd@e@N]JODYH[JKBIBE@KBKBMBKBQBWBa@@YBc@?i@@SAO?OCMAKAI?UC[AI?I?A?I@I@KDODIDIFMFIHSP_@\\[\\SVOP]b@c@f@c@h@w@bAg@p@SXGJs@`AMNW\\W\\ABEDEDCBCDGBCBCBE@GDC@E@A@IBC@]LA?i@RUHkBd@OD_AV[@VaBf@UH[@V]@T[@X]@V[Bl@[@V]@XaBd@UFgBh@SF[@V[@Xw@Rm@RUF]@V]@XsBn@"
                                    ],
                                    "start_location" => [
                                        "lat" => -20.0573765,
                                        "lng" => -44.25704959999999
                                    ],
                                    "travel_mode" => "DRIVING"
                                ],
                                [
                                    "distance" => [
                                        "text" => "0.3 km",
                                        "value" => 316
                                    ],
                                    "duration" => [
                                        "text" => "1 min",
                                        "value" => 55
                                    ],
                                    "end_location" => [
                                        "lat" => -20.0432298,
                                        "lng" => -44.2672041
                                    ],
                                    "html_instructions" => "Turn <b>left</b> after Supermarket Lara Rezende (on the left)",
                                    "maneuver" => "turn-left",
                                    "polyline" => [
                                        "points" => "doiyBfkdmGFZDRLd@fAfEf@jBDNJb@VdAFh@@H"
                                    ],
                                    "start_location" => [
                                        "lat" => -20.0422706,
                                        "lng" => -44.2643622
                                    ],
                                    "travel_mode" => "DRIVING"
                                ],
                                [
                                    "distance" => [
                                        "text" => "65 m",
                                        "value" => 65
                                    ],
                                    "duration" => [
                                        "text" => "1 min",
                                        "value" => 10
                                    ],
                                    "end_location" => [
                                        "lat" => -20.0426854,
                                        "lng" => -44.2674409
                                    ],
                                    "html_instructions" => "Turn <b>right</b> onto <b>Av. Rui Barbosa</b>",
                                    "maneuver" => "turn-right",
                                    "polyline" => [
                                        "points" => "duiyB~|dmGKFIBIBGBg@N[J"
                                    ],
                                    "start_location" => [
                                        "lat" => -20.0432298,
                                        "lng" => -44.2672041
                                    ],
                                    "travel_mode" => "DRIVING"
                                ],
                                [
                                    "distance" => [
                                        "text" => "0.3 km",
                                        "value" => 252
                                    ],
                                    "duration" => [
                                        "text" => "1 min",
                                        "value" => 26
                                    ],
                                    "end_location" => [
                                        "lat" => -20.0432988,
                                        "lng" => -44.2692843
                                    ],
                                    "html_instructions" => "At the roundabout, take the <b>2nd</b> exit onto <b>R. Lateral</b>",
                                    "maneuver" => "roundabout-right",
                                    "polyline" => [
                                        "points" => "xqiyBn~dmGAAAA?AA??AAAA??AA?AAA?AAA?A?A?A?A?A?A?A?A@A?A@A@A??@A@A??@A@?@A@?@?@?@?@?@?@?@?@@??@?@@??@@@@@@LDHDPTl@Tj@Vp@NZ^~@@@JHTt@"
                                    ],
                                    "start_location" => [
                                        "lat" => -20.0426854,
                                        "lng" => -44.2674409
                                    ],
                                    "travel_mode" => "DRIVING"
                                ],
                                [
                                    "distance" => [
                                        "text" => "0.1 km",
                                        "value" => 100
                                    ],
                                    "duration" => [
                                        "text" => "1 min",
                                        "value" => 10
                                    ],
                                    "end_location" => [
                                        "lat" => -20.0437387,
                                        "lng" => -44.2701151
                                    ],
                                    "html_instructions" => "Continue onto <b>Av. Dona Mariquinha de Resende</b>",
                                    "polyline" => [
                                        "points" => "ruiyB~iemGLRHPZn@Pf@Ph@"
                                    ],
                                    "start_location" => [
                                        "lat" => -20.0432988,
                                        "lng" => -44.2692843
                                    ],
                                    "travel_mode" => "DRIVING"
                                ],
                                [
                                    "distance" => [
                                        "text" => "0.4 km",
                                        "value" => 388
                                    ],
                                    "duration" => [
                                        "text" => "1 min",
                                        "value" => 41
                                    ],
                                    "end_location" => [
                                        "lat" => -20.0450604,
                                        "lng" => -44.2735309
                                    ],
                                    "html_instructions" => "Continue onto <b>R. Marginal</b>",
                                    "polyline" => [
                                        "points" => "jxiyBfoemGTpAFV^|AJn@R~@H\\Px@FTHRNVHPL\\Tv@Pb@Zr@DHHL"
                                    ],
                                    "start_location" => [
                                        "lat" => -20.0437387,
                                        "lng" => -44.2701151
                                    ],
                                    "travel_mode" => "DRIVING"
                                ],
                                [
                                    "distance" => [
                                        "text" => "57 m",
                                        "value" => 57
                                    ],
                                    "duration" => [
                                        "text" => "1 min",
                                        "value" => 5
                                    ],
                                    "end_location" => [
                                        "lat" => -20.0454716,
                                        "lng" => -44.2738428
                                    ],
                                    "html_instructions" => "Take the ramp to <b>São Paulo</b>",
                                    "polyline" => [
                                        "points" => "r`jyBpdfmGNHFDFFHJLLLFJB"
                                    ],
                                    "start_location" => [
                                        "lat" => -20.0450604,
                                        "lng" => -44.2735309
                                    ],
                                    "travel_mode" => "DRIVING"
                                ],
                                [
                                    "distance" => [
                                        "text" => "3.7 km",
                                        "value" => 3700
                                    ],
                                    "duration" => [
                                        "text" => "3 mins",
                                        "value" => 172
                                    ],
                                    "end_location" => [
                                        "lat" => -20.0690154,
                                        "lng" => -44.2980258
                                    ],
                                    "html_instructions" => "Merge onto <b>BR-381</b>",
                                    "maneuver" => "merge",
                                    "polyline" => [
                                        "points" => "dcjyBnffmGNNNNNJTPPJPJb@Tf@TND^NJDnAd@|@Z^NXLXNZPb@Vb@ZNLJJFBLNRPNPV\\NPV^Vd@NVJRFNFNDLJVJ`@HXH^Jf@PdABLTrAJj@FRFTL^JXHNHNLTV^JLNRLN`@`@dAdAtBnBp@n@HJr@t@n@p@Z^d@j@\\b@dArAh@p@zBxClA|ArAdBn@~@lBdCZb@FFTXt@`AjAzAbApAtAfBpAfBLPFH~@lA`BxBt@`Av@bAZ`@Z\\|@`A^^j@l@`A~@TRZV\\\\XRbAx@h@^^X~AjAdLbInBrAh@\\\\TnBrADBZTtBvAPJpE`DDBpCjBZV\\V"
                                    ],
                                    "start_location" => [
                                        "lat" => -20.0454716,
                                        "lng" => -44.2738428
                                    ],
                                    "travel_mode" => "DRIVING"
                                ],
                                [
                                    "distance" => [
                                        "text" => "0.1 km",
                                        "value" => 134
                                    ],
                                    "duration" => [
                                        "text" => "1 min",
                                        "value" => 12
                                    ],
                                    "end_location" => [
                                        "lat" => -20.0698115,
                                        "lng" => -44.2989702
                                    ],
                                    "html_instructions" => "Take exit <b>513</b> toward <b>Igarapé</b>/<wbr/><b>Centro</b>",
                                    "maneuver" => "ramp-right",
                                    "polyline" => [
                                        "points" => "jvnyBt]jmG?B@BFJ@BBBhBjBTXDDBHBH"
                                    ],
                                    "start_location" => [
                                        "lat" => -20.0690154,
                                        "lng" => -44.2980258
                                    ],
                                    "travel_mode" => "DRIVING"
                                ],
                                [
                                    "distance" => [
                                        "text" => "87 m",
                                        "value" => 87
                                    ],
                                    "duration" => [
                                        "text" => "1 min",
                                        "value" => 15
                                    ],
                                    "end_location" => [
                                        "lat" => -20.0704483,
                                        "lng" => -44.2994464
                                    ],
                                    "html_instructions" => "Merge onto <b>Av. Bernadino da Silva Couto</b>",
                                    "maneuver" => "merge",
                                    "polyline" => [
                                        "points" => "h[nyBpckmGz@j@bAr@"
                                    ],
                                    "start_location" => [
                                        "lat" => -20.0698115,
                                        "lng" => -44.2989702
                                    ],
                                    "travel_mode" => "DRIVING"
                                ],
                                [
                                    "distance" => [
                                        "text" => "0.4 km",
                                        "value" => 395
                                    ],
                                    "duration" => [
                                        "text" => "1 min",
                                        "value" => 82
                                    ],
                                    "end_location" => [
                                        "lat" => -20.071281,
                                        "lng" => -44.303097
                                    ],
                                    "html_instructions" => "Turn <b>right</b> onto <b>Av. Berenice Magalhães Pinto</b>",
                                    "maneuver" => "turn-right",
                                    "polyline" => [
                                        "points" => "h_oyBpfkmG?@`@lCJh@BRj@hDDTP|@Ld@d@lDEV@`@"
                                    ],
                                    "start_location" => [
                                        "lat" => -20.0704483,
                                        "lng" => -44.2994464
                                    ],
                                    "travel_mode" => "DRIVING"
                                ],
                                [
                                    "distance" => [
                                        "text" => "2.3 km",
                                        "value" => 2260
                                    ],
                                    "duration" => [
                                        "text" => "6 mins",
                                        "value" => 386
                                    ],
                                    "end_location" => [
                                        "lat" => -20.0656041,
                                        "lng" => -44.3234797
                                    ],
                                    "html_instructions" => "At the roundabout, continue straight onto <b>Av. Prof. Clóvis Salgado</b>",
                                    "maneuver" => "roundabout-right",
                                    "polyline" => [
                                        "points" => "ndoyBj]kmGA??@A??@A??@?@A??@@??@?@?@@?ANANaA`CkAdCSb@k@rA_AtBABABu@pBe@`Ae@`Ac@~@Oj@Mb@IVCJI\\_@bBGX]lBYdBId@UfAIb@G\\[bBENUfAKb@UfAAL_@hBCJc@bCc@bCa@bCe@bCe@hCCNa@vBg@pCY~Ag@lCk@tCALKf@Ib@EVKr@Cx@AL?L?J@j@D~@FhABTBd@FjAPjCBVBd@"
                                    ],
                                    "start_location" => [
                                        "lat" => -20.071281,
                                        "lng" => -44.303097
                                    ],
                                    "travel_mode" => "DRIVING"
                                ],
                                [
                                    "distance" => [
                                        "text" => "2.8 km",
                                        "value" => 2842
                                    ],
                                    "duration" => [
                                        "text" => "5 mins",
                                        "value" => 289
                                    ],
                                    "end_location" => [
                                        "lat" => -20.0753569,
                                        "lng" => -44.3476783
                                    ],
                                    "html_instructions" => "Continue onto <b>Av. Cristiano Chaves de Oliveira</b>",
                                    "polyline" => [
                                        "points" => "~`nyBv|omGDX?JLpB?DBd@@RFv@?HBZBd@Bf@@R@PBd@Bd@HjAFjABd@LhCHlAFhADb@FbBVhD?@D^?DD^@DF\\@FJb@@BHZ@BJXBFDHFNPZPXJN\\f@`@l@V^NVPZNZJXHVFVDPBL`@`CJf@N|@HZDRBLF\\DRDRJt@Jt@Lx@Jh@DVNn@FX@@FTDJDJJRZn@r@fAfA|APTRZZd@HLLRFJDFLXJRBJBDFPNl@DN\\lB@@\\jB@BThAF^@D^nBXfAPv@HRHLFTp@bAtA|BdAxA`@l@NXFLJTN`@J^F`@PlATzARlADJHNNR`@ZTNFDrBjBr@d@|@f@|@b@"
                                    ],
                                    "start_location" => [
                                        "lat" => -20.0656041,
                                        "lng" => -44.3234797
                                    ],
                                    "travel_mode" => "DRIVING"
                                ],
                                [
                                    "distance" => [
                                        "text" => "1.1 km",
                                        "value" => 1095
                                    ],
                                    "duration" => [
                                        "text" => "2 mins",
                                        "value" => 93
                                    ],
                                    "end_location" => [
                                        "lat" => -20.0845176,
                                        "lng" => -44.3503667
                                    ],
                                    "html_instructions" => "Continue onto <b>R. Dezenove</b>",
                                    "polyline" => [
                                        "points" => "~]oyB~stmGLFPFXHXFRHh@ZfAr@NJrCdBTJPHVFVFTDF@NBVBVB|@D^Bv@JB?\\FXFF@j@NRHp@XnBz@bBx@XJXHZHPDn@JbBTF@RDXD\\?ZA\\ClAM~@MfAW^GNEZAN?@?D@D@@@LL"
                                    ],
                                    "start_location" => [
                                        "lat" => -20.0753569,
                                        "lng" => -44.3476783
                                    ],
                                    "travel_mode" => "DRIVING"
                                ],
                                [
                                    "distance" => [
                                        "text" => "63 m",
                                        "value" => 63
                                    ],
                                    "duration" => [
                                        "text" => "1 min",
                                        "value" => 10
                                    ],
                                    "end_location" => [
                                        "lat" => -20.0846336,
                                        "lng" => -44.3509531
                                    ],
                                    "html_instructions" => "Continue onto <b>R. Vinte</b>",
                                    "polyline" => [
                                        "points" => "fwqyBxdumGBD@B@D?B@F@FHnA"
                                    ],
                                    "start_location" => [
                                        "lat" => -20.0845176,
                                        "lng" => -44.3503667
                                    ],
                                    "travel_mode" => "DRIVING"
                                ],
                                [
                                    "distance" => [
                                        "text" => "0.6 km",
                                        "value" => 617
                                    ],
                                    "duration" => [
                                        "text" => "1 min",
                                        "value" => 72
                                    ],
                                    "end_location" => [
                                        "lat" => -20.084187,
                                        "lng" => -44.3562924
                                    ],
                                    "html_instructions" => "Continue onto <b>Av. A</b>",
                                    "polyline" => [
                                        "points" => "|wqyBlhumGHd@?B@R@PDb@DZBL@D@FFL@BFNJNBFDDLNNNJJJNDDBFDHBHFRBJBR?H?J?NCXEPGVI^O`@AFGLOX_@h@GHUZINEFEFABEHENCFETQp@Ib@EROt@WdC"
                                    ],
                                    "start_location" => [
                                        "lat" => -20.0846336,
                                        "lng" => -44.3509531
                                    ],
                                    "travel_mode" => "DRIVING"
                                ],
                                [
                                    "distance" => [
                                        "text" => "2.4 km",
                                        "value" => 2360
                                    ],
                                    "duration" => [
                                        "text" => "7 mins",
                                        "value" => 448
                                    ],
                                    "end_location" => [
                                        "lat" => -20.064749,
                                        "lng" => -44.347548
                                    ],
                                    "html_instructions" => "Turn <b>right</b> onto <b>R. Rio Grande do Sul</b>/<wbr/><b>R. Um</b>",
                                    "maneuver" => "turn-right",
                                    "polyline" => [
                                        "points" => "duqyBxivmG_C]kC_@sIwAg@OgBk@SEaAYYIkA_@AAaAa@_@QGCuAm@]A[@sAi@WEQAMCwAO[Ey@Ks@KWGKCKCUKOIaBs@aCcA_Bs@CAkAg@o@WoAk@q@YCA[O_@Oe@Ui@SOGOGyAo@sAi@e@S]CqAo@YgAg@a@Qu@]u@[SISEOC[A]@i@OcCiAEECAg@UyAm@YMmCgAyBaAw@YIA"
                                    ],
                                    "start_location" => [
                                        "lat" => -20.084187,
                                        "lng" => -44.3562924
                                    ],
                                    "travel_mode" => "DRIVING"
                                ],
                                [
                                    "distance" => [
                                        "text" => "0.3 km",
                                        "value" => 329
                                    ],
                                    "duration" => [
                                        "text" => "1 min",
                                        "value" => 61
                                    ],
                                    "end_location" => [
                                        "lat" => -20.0660426,
                                        "lng" => -44.3454056
                                    ],
                                    "html_instructions" => "Turn <b>right</b>",
                                    "maneuver" => "turn-right",
                                    "polyline" => [
                                        "points" => "t[myBdstmGAgACkA?ACiAAmA?G@IBEJERIxAi@fA[VIl@E"
                                    ],
                                    "start_location" => [
                                        "lat" => -20.064749,
                                        "lng" => -44.347548
                                    ],
                                    "travel_mode" => "DRIVING"
                                ],
                                [
                                    "distance" => [
                                        "text" => "0.1 km",
                                        "value" => 101
                                    ],
                                    "duration" => [
                                        "text" => "1 min",
                                        "value" => 22
                                    ],
                                    "end_location" => [
                                        "lat" => -20.0656116,
                                        "lng" => -44.34456249999999
                                    ],
                                    "html_instructions" => "Turn <b>left</b>",
                                    "maneuver" => "turn-left",
                                    "polyline" => [
                                        "points" => "vcnyBxetmGQq@k@[@W[@"
                                    ],
                                    "start_location" => [
                                        "lat" => -20.0660426,
                                        "lng" => -44.3454056
                                    ],
                                    "travel_mode" => "DRIVING"
                                ]
                            ],
                            "traffic_speed_entry" => [],
                            "via_waypoint" => []
                        ]
                    ],
                    "overview_polyline" => [
                        "points" => "d|myB~`cmGqEBmD@AkCa@@gA?gA?sKB[LFcADgDfAeD`Aq@NeBLqB?s@GeAEa@Hq@ZyAvAeBtB[AlB[@jAaBzBe@l@i@^uBt@wFzAqF~AqHvB]GpBcKzCsBn@FZRx@`CfJVdAFh@@HKFSFo@R]HACECKEM@IFEJ?JDFHXhA|Cn@zALJTt@LRd@`Ab@pA\\hBhAjFXnAXj@Vn@f@zA`@|@HLNHNLVXXJ^^hAt@jAj@n@TxDvAr@\\~@h@fAx@hApAf@p@f@|@`@`Aj@rBv@nER~@Tt@l@nA`ApAnGfGhCrCrDtElI|KbMbPfDpEjF`HdDlDpChCfDfCdOnKxCpBnDbC~IhGlDbC\\ZNV~BdCHNBHz@j@bAr@l@xDfApGLd@d@lDEV@`@A?A@A@?F?B?NANaA`C_BhDkBhECFu@pBe@`AiA`C]nAw@dDiArGcAlF]@bEiAfGeAfGkAlGgBxJaBxIOz@Kr@Cx@AZ@v@TdEt@rLZxFv@rNLlB^lGJfAVnAX|@b@|@|A~Bf@v@`@v@b@zA|ApIb@rCn@jDV|@P^nAvBhCtDd@t@`@~@V~@b@|B`@pB^nB^nBj@~BR`@FTp@bAtA|BdAxAp@fARb@Z`AbAxGNZNR`@Z\\TrBjBr@d@zBjA^Nr@P|@d@vA~@hDpBvA^fAL|AHz@JjB`@dAb@rEtBr@Tl@NnDh@v@Dx@ElC[fB_@j@GP?JBNNFRVdCHlALv@\\p@hAvATr@Bx@Ij@Qv@Qh@Wf@gA~AS\\a@~A_@lBWdC_C]_NwBoC[@uA_@eBi@cAc@g@UuAm@]A[@sAi@WE_@EaFm@c@Ka@OqB]@aFwBoEmBqB[@oBy@qJ_EoEqBiAe@c@I[A]@i@OiCoA_DsAgGiCaA[I_FAuADO^O`DeAVIl@EQq@k@[@W[@"
                    ],
                    "summary" => "BR-381",
                    "warnings" => [],
                    "waypoint_order" => []
                ]
            ],
            "status" => "OK"
        ];
        $google = $this->createMock(GoogleApis::class);
        $google->method('requestDirections')->willReturn($response);
        $deliveryRouteController = new DeliveryRouteController($google);
        $cep = "32920-000";


        //expect
        $expects = ["succes" => "200"];


        //action
        $result = $deliveryRouteController->portage($cep);

        //assert
        $this->assertEquals($result, [
            "succes" => "200"
        ]);
    }

        public function test_sholdReturnError()
    {
        //arrange
        $response = [
            "geocoded_waypoints"=> [
                [
                    "geocoder_status"=> "OK",
                    "place_id"=> "ChIJT0PVVFbQpgARkzHf7_73KEI",
                    "types"=> [
                        "postal_code"
                    ]
                ],
                [
                    "geocoder_status"=> "OK",
                    "place_id"=> "ChIJQcqGaqTWpgARN5OKp4oyKGY",
                    "types"=> [
                        "postal_code"
                    ]
                ]
            ],
            "routes"=> [
                [
                    "bounds"=> [
                        "northeast"=> [
                            "lat"=> -20.0422706,
                            "lng"=> -44.2569349
                        ],
                        "southwest"=> [
                            "lat"=> -20.0854471,
                            "lng"=> -44.3562924
                        ]
                    ],
                    "copyrights"=> "Map data ©2022",
                    "legs"=> [
                        [
                            "distance"=> [
                                "text"=> "18.0 km",
                                "value"=> 17962
                            ],
                            "duration"=> [
                                "text"=> "38 mins",
                                "value"=> 2255
                            ],
                            "end_address"=> "Igarapé - State of Minas Gerais, 32900-000, Brazil",
                            "end_location"=> [
                                "lat"=> -20.0656116,
                                "lng"=> -44.34456249999999
                            ],
                            "start_address"=> "São Joaquim de Bicas - State of Minas Gerais, 32920-000, Brazil",
                            "start_location"=> [
                                "lat"=> -20.0648258,
                                "lng"=> -44.2576031
                            ],
                            "steps"=> [
                                [
                                    "distance"=> [
                                        "text"=> "0.2 km",
                                        "value"=> 214
                                    ],
                                    "duration"=> [
                                        "text"=> "1 min",
                                        "value"=> 33
                                    ],
                                    "end_location"=> [
                                        "lat"=> -20.0629054,
                                        "lng"=> -44.2576257
                                    ],
                                    "html_instructions"=> "Head <b>north</b> on <b>R. Lavras</b> toward <b>R. Geraldo Freitas Campos</b>",
                                    "polyline"=> [
                                        "points"=> "d|myB~`cmGm@?yA@a@?g@@_@?mC@"
                                    ],
                                    "start_location"=> [
                                        "lat"=> -20.0648258,
                                        "lng"=> -44.2576031
                                    ],
                                    "travel_mode"=> "DRIVING"
                                ],
                                [
                                    "distance"=> [
                                        "text"=> "72 m",
                                        "value"=> 72
                                    ],
                                    "duration"=> [
                                        "text"=> "1 min",
                                        "value"=> 25
                                    ],
                                    "end_location"=> [
                                        "lat"=> -20.0629003,
                                        "lng"=> -44.2569349
                                    ],
                                    "html_instructions"=> "Turn <b>right</b> at the 1st cross street onto <b>R. Geraldo Freitas Campos</b>",
                                    "maneuver"=> "turn-right",
                                    "polyline"=> [
                                        "points"=> "dpmyBdacmGAkC"
                                    ],
                                    "start_location"=> [
                                        "lat"=> -20.0629054,
                                        "lng"=> -44.2576257
                                    ],
                                    "travel_mode"=> "DRIVING"
                                ],
                                [
                                    "distance"=> [
                                        "text"=> "0.6 km",
                                        "value"=> 615
                                    ],
                                    "duration"=> [
                                        "text"=> "2 mins",
                                        "value"=> 103
                                    ],
                                    "end_location"=> [
                                        "lat"=> -20.0573765,
                                        "lng"=> -44.25704959999999
                                    ],
                                    "html_instructions"=> "Turn <b>left</b> at the 1st cross street onto <b>R. Igarapé</b>",
                                    "maneuver"=> "turn-left",
                                    "polyline"=> [
                                        "points"=> "bpmyBx|bmGa@@c@?c@?_@?g@?c@@eA?qC@wC?uBByB@s@?K?cA@G?m@AQ@S?S@O@K@IB"
                                    ],
                                    "start_location"=> [
                                        "lat"=> -20.0629003,
                                        "lng"=> -44.2569349
                                    ],
                                    "travel_mode"=> "DRIVING"
                                ],
                                [
                                    "distance"=> [
                                        "text"=> "1.9 km",
                                        "value"=> 1900
                                    ],
                                    "duration"=> [
                                        "text"=> "5 mins",
                                        "value"=> 285
                                    ],
                                    "end_location"=> [
                                        "lat"=> -20.0422706,
                                        "lng"=> -44.2643622
                                    ],
                                    "html_instructions"=> "Continue onto <b>R. José Gabriel de Rezende</b>",
                                    "polyline"=> [
                                        "points"=> "rmlyBp]bmGe@Na@LuAd@e@N]JODYH[JKBIBE@KBKBMBKBQBWBa@@YBc@?i@@SAO?OCMAKAI?UC[AI?I?A?I@I@KDODIDIFMFIHSP_@\\[\\SVOP]b@c@f@c@h@w@bAg@p@SXGJs@`AMNW\\W\\ABEDEDCBCDGBCBCBE@GDC@E@A@IBC@]LA?i@RUHkBd@OD_AV[@VaBf@UH[@V]@T[@X]@V[Bl@[@V]@XaBd@UFgBh@SF[@V[@Xw@Rm@RUF]@V]@XsBn@"
                                    ],
                                    "start_location"=> [
                                        "lat"=> -20.0573765,
                                        "lng"=> -44.25704959999999
                                    ],
                                    "travel_mode"=> "DRIVING"
                                ],
                                [
                                    "distance"=> [
                                        "text"=> "0.3 km",
                                        "value"=> 316
                                    ],
                                    "duration"=> [
                                        "text"=> "1 min",
                                        "value"=> 55
                                    ],
                                    "end_location"=> [
                                        "lat"=> -20.0432298,
                                        "lng"=> -44.2672041
                                    ],
                                    "html_instructions"=> "Turn <b>left</b> after Supermarket Lara Rezende (on the left)",
                                    "maneuver"=> "turn-left",
                                    "polyline"=> [
                                        "points"=> "doiyBfkdmGFZDRLd@fAfEf@jBDNJb@VdAFh@@H"
                                    ],
                                    "start_location"=> [
                                        "lat"=> -20.0422706,
                                        "lng"=> -44.2643622
                                    ],
                                    "travel_mode"=> "DRIVING"
                                ],
                                [
                                    "distance"=> [
                                        "text"=> "65 m",
                                        "value"=> 65
                                    ],
                                    "duration"=> [
                                        "text"=> "1 min",
                                        "value"=> 10
                                    ],
                                    "end_location"=> [
                                        "lat"=> -20.0426854,
                                        "lng"=> -44.2674409
                                    ],
                                    "html_instructions"=> "Turn <b>right</b> onto <b>Av. Rui Barbosa</b>",
                                    "maneuver"=> "turn-right",
                                    "polyline"=> [
                                        "points"=> "duiyB~|dmGKFIBIBGBg@N[J"
                                    ],
                                    "start_location"=> [
                                        "lat"=> -20.0432298,
                                        "lng"=> -44.2672041
                                    ],
                                    "travel_mode"=> "DRIVING"
                                ],
                                [
                                    "distance"=> [
                                        "text"=> "0.3 km",
                                        "value"=> 252
                                    ],
                                    "duration"=> [
                                        "text"=> "1 min",
                                        "value"=> 26
                                    ],
                                    "end_location"=> [
                                        "lat"=> -20.0432988,
                                        "lng"=> -44.2692843
                                    ],
                                    "html_instructions"=> "At the roundabout, take the <b>2nd</b> exit onto <b>R. Lateral</b>",
                                    "maneuver"=> "roundabout-right",
                                    "polyline"=> [
                                        "points"=> "xqiyBn~dmGAAAA?AA??AAAA??AA?AAA?AAA?A?A?A?A?A?A?A?A@A?A@A@A??@A@A??@A@?@A@?@?@?@?@?@?@?@?@@??@?@@??@@@@@@LDHDPTl@Tj@Vp@NZ^~@@@JHTt@"
                                    ],
                                    "start_location"=> [
                                        "lat"=> -20.0426854,
                                        "lng"=> -44.2674409
                                    ],
                                    "travel_mode"=> "DRIVING"
                                ],
                                [
                                    "distance"=> [
                                        "text"=> "0.1 km",
                                        "value"=> 100
                                    ],
                                    "duration"=> [
                                        "text"=> "1 min",
                                        "value"=> 10
                                    ],
                                    "end_location"=> [
                                        "lat"=> -20.0437387,
                                        "lng"=> -44.2701151
                                    ],
                                    "html_instructions"=> "Continue onto <b>Av. Dona Mariquinha de Resende</b>",
                                    "polyline"=> [
                                        "points"=> "ruiyB~iemGLRHPZn@Pf@Ph@"
                                    ],
                                    "start_location"=> [
                                        "lat"=> -20.0432988,
                                        "lng"=> -44.2692843
                                    ],
                                    "travel_mode"=> "DRIVING"
                                ],
                                [
                                    "distance"=> [
                                        "text"=> "0.4 km",
                                        "value"=> 388
                                    ],
                                    "duration"=> [
                                        "text"=> "1 min",
                                        "value"=> 41
                                    ],
                                    "end_location"=> [
                                        "lat"=> -20.0450604,
                                        "lng"=> -44.2735309
                                    ],
                                    "html_instructions"=> "Continue onto <b>R. Marginal</b>",
                                    "polyline"=> [
                                        "points"=> "jxiyBfoemGTpAFV^|AJn@R~@H\\Px@FTHRNVHPL\\Tv@Pb@Zr@DHHL"
                                    ],
                                    "start_location"=> [
                                        "lat"=> -20.0437387,
                                        "lng"=> -44.2701151
                                    ],
                                    "travel_mode"=> "DRIVING"
                                ],
                                [
                                    "distance"=> [
                                        "text"=> "57 m",
                                        "value"=> 57
                                    ],
                                    "duration"=> [
                                        "text"=> "1 min",
                                        "value"=> 5
                                    ],
                                    "end_location"=> [
                                        "lat"=> -20.0454716,
                                        "lng"=> -44.2738428
                                    ],
                                    "html_instructions"=> "Take the ramp to <b>São Paulo</b>",
                                    "polyline"=> [
                                        "points"=> "r`jyBpdfmGNHFDFFHJLLLFJB"
                                    ],
                                    "start_location"=> [
                                        "lat"=> -20.0450604,
                                        "lng"=> -44.2735309
                                    ],
                                    "travel_mode"=> "DRIVING"
                                ],
                                [
                                    "distance"=> [
                                        "text"=> "3.7 km",
                                        "value"=> 3700
                                    ],
                                    "duration"=> [
                                        "text"=> "3 mins",
                                        "value"=> 172
                                    ],
                                    "end_location"=> [
                                        "lat"=> -20.0690154,
                                        "lng"=> -44.2980258
                                    ],
                                    "html_instructions"=> "Merge onto <b>BR-381</b>",
                                    "maneuver"=> "merge",
                                    "polyline"=> [
                                        "points"=> "dcjyBnffmGNNNNNJTPPJPJb@Tf@TND^NJDnAd@|@Z^NXLXNZPb@Vb@ZNLJJFBLNRPNPV\\NPV^Vd@NVJRFNFNDLJVJ`@HXH^Jf@PdABLTrAJj@FRFTL^JXHNHNLTV^JLNRLN`@`@dAdAtBnBp@n@HJr@t@n@p@Z^d@j@\\b@dArAh@p@zBxClA|ArAdBn@~@lBdCZb@FFTXt@`AjAzAbApAtAfBpAfBLPFH~@lA`BxBt@`Av@bAZ`@Z\\|@`A^^j@l@`A~@TRZV\\\\XRbAx@h@^^X~AjAdLbInBrAh@\\\\TnBrADBZTtBvAPJpE`DDBpCjBZV\\V"
                                    ],
                                    "start_location"=> [
                                        "lat"=> -20.0454716,
                                        "lng"=> -44.2738428
                                    ],
                                    "travel_mode"=> "DRIVING"
                                ],
                                [
                                    "distance"=> [
                                        "text"=> "0.1 km",
                                        "value"=> 134
                                    ],
                                    "duration"=> [
                                        "text"=> "1 min",
                                        "value"=> 12
                                    ],
                                    "end_location"=> [
                                        "lat"=> -20.0698115,
                                        "lng"=> -44.2989702
                                    ],
                                    "html_instructions"=> "Take exit <b>513</b> toward <b>Igarapé</b>/<wbr/><b>Centro</b>",
                                    "maneuver"=> "ramp-right",
                                    "polyline"=> [
                                        "points"=> "jvnyBt]jmG?B@BFJ@BBBhBjBTXDDBHBH"
                                    ],
                                    "start_location"=> [
                                        "lat"=> -20.0690154,
                                        "lng"=> -44.2980258
                                    ],
                                    "travel_mode"=> "DRIVING"
                                ],
                                [
                                    "distance"=> [
                                        "text"=> "87 m",
                                        "value"=> 87
                                    ],
                                    "duration"=> [
                                        "text"=> "1 min",
                                        "value"=> 15
                                    ],
                                    "end_location"=> [
                                        "lat"=> -20.0704483,
                                        "lng"=> -44.2994464
                                    ],
                                    "html_instructions"=> "Merge onto <b>Av. Bernadino da Silva Couto</b>",
                                    "maneuver"=> "merge",
                                    "polyline"=> [
                                        "points"=> "h[nyBpckmGz@j@bAr@"
                                    ],
                                    "start_location"=> [
                                        "lat"=> -20.0698115,
                                        "lng"=> -44.2989702
                                    ],
                                    "travel_mode"=> "DRIVING"
                                ],
                                [
                                    "distance"=> [
                                        "text"=> "0.4 km",
                                        "value"=> 395
                                    ],
                                    "duration"=> [
                                        "text"=> "1 min",
                                        "value"=> 82
                                    ],
                                    "end_location"=> [
                                        "lat"=> -20.071281,
                                        "lng"=> -44.303097
                                    ],
                                    "html_instructions"=> "Turn <b>right</b> onto <b>Av. Berenice Magalhães Pinto</b>",
                                    "maneuver"=> "turn-right",
                                    "polyline"=> [
                                        "points"=> "h_oyBpfkmG?@`@lCJh@BRj@hDDTP|@Ld@d@lDEV@`@"
                                    ],
                                    "start_location"=> [
                                        "lat"=> -20.0704483,
                                        "lng"=> -44.2994464
                                    ],
                                    "travel_mode"=> "DRIVING"
                                ],
                                [
                                    "distance"=> [
                                        "text"=> "2.3 km",
                                        "value"=> 2260
                                    ],
                                    "duration"=> [
                                        "text"=> "6 mins",
                                        "value"=> 386
                                    ],
                                    "end_location"=> [
                                        "lat"=> -20.0656041,
                                        "lng"=> -44.3234797
                                    ],
                                    "html_instructions"=> "At the roundabout, continue straight onto <b>Av. Prof. Clóvis Salgado</b>",
                                    "maneuver"=> "roundabout-right",
                                    "polyline"=> [
                                        "points"=> "ndoyBj]kmGA??@A??@A??@?@A??@@??@?@?@@?ANANaA`CkAdCSb@k@rA_AtBABABu@pBe@`Ae@`Ac@~@Oj@Mb@IVCJI\\_@bBGX]lBYdBId@UfAIb@G\\[bBENUfAKb@UfAAL_@hBCJc@bCc@bCa@bCe@bCe@hCCNa@vBg@pCY~Ag@lCk@tCALKf@Ib@EVKr@Cx@AL?L?J@j@D~@FhABTBd@FjAPjCBVBd@"
                                    ],
                                    "start_location"=> [
                                        "lat"=> -20.071281,
                                        "lng"=> -44.303097
                                    ],
                                    "travel_mode"=> "DRIVING"
                                ],
                                [
                                    "distance"=> [
                                        "text"=> "2.8 km",
                                        "value"=> 2842
                                    ],
                                    "duration"=> [
                                        "text"=> "5 mins",
                                        "value"=> 289
                                    ],
                                    "end_location"=> [
                                        "lat"=> -20.0753569,
                                        "lng"=> -44.3476783
                                    ],
                                    "html_instructions"=> "Continue onto <b>Av. Cristiano Chaves de Oliveira</b>",
                                    "polyline"=> [
                                        "points"=> "~`nyBv|omGDX?JLpB?DBd@@RFv@?HBZBd@Bf@@R@PBd@Bd@HjAFjABd@LhCHlAFhADb@FbBVhD?@D^?DD^@DF\\@FJb@@BHZ@BJXBFDHFNPZPXJN\\f@`@l@V^NVPZNZJXHVFVDPBL`@`CJf@N|@HZDRBLF\\DRDRJt@Jt@Lx@Jh@DVNn@FX@@FTDJDJJRZn@r@fAfA|APTRZZd@HLLRFJDFLXJRBJBDFPNl@DN\\lB@@\\jB@BThAF^@D^nBXfAPv@HRHLFTp@bAtA|BdAxA`@l@NXFLJTN`@J^F`@PlATzARlADJHNNR`@ZTNFDrBjBr@d@|@f@|@b@"
                                    ],
                                    "start_location"=> [
                                        "lat"=> -20.0656041,
                                        "lng"=> -44.3234797
                                    ],
                                    "travel_mode"=> "DRIVING"
                                ],
                                [
                                    "distance"=> [
                                        "text"=> "1.1 km",
                                        "value"=> 1095
                                    ],
                                    "duration"=> [
                                        "text"=> "2 mins",
                                        "value"=> 93
                                    ],
                                    "end_location"=> [
                                        "lat"=> -20.0845176,
                                        "lng"=> -44.3503667
                                    ],
                                    "html_instructions"=> "Continue onto <b>R. Dezenove</b>",
                                    "polyline"=> [
                                        "points"=> "~]oyB~stmGLFPFXHXFRHh@ZfAr@NJrCdBTJPHVFVFTDF@NBVBVB|@D^Bv@JB?\\FXFF@j@NRHp@XnBz@bBx@XJXHZHPDn@JbBTF@RDXD\\?ZA\\ClAM~@MfAW^GNEZAN?@?D@D@@@LL"
                                    ],
                                    "start_location"=> [
                                        "lat"=> -20.0753569,
                                        "lng"=> -44.3476783
                                    ],
                                    "travel_mode"=> "DRIVING"
                                ],
                                [
                                    "distance"=> [
                                        "text"=> "63 m",
                                        "value"=> 63
                                    ],
                                    "duration"=> [
                                        "text"=> "1 min",
                                        "value"=> 10
                                    ],
                                    "end_location"=> [
                                        "lat"=> -20.0846336,
                                        "lng"=> -44.3509531
                                    ],
                                    "html_instructions"=> "Continue onto <b>R. Vinte</b>",
                                    "polyline"=> [
                                        "points"=> "fwqyBxdumGBD@B@D?B@F@FHnA"
                                    ],
                                    "start_location"=> [
                                        "lat"=> -20.0845176,
                                        "lng"=> -44.3503667
                                    ],
                                    "travel_mode"=> "DRIVING"
                                ],
                                [
                                    "distance"=> [
                                        "text"=> "0.6 km",
                                        "value"=> 617
                                    ],
                                    "duration"=> [
                                        "text"=> "1 min",
                                        "value"=> 72
                                    ],
                                    "end_location"=> [
                                        "lat"=> -20.084187,
                                        "lng"=> -44.3562924
                                    ],
                                    "html_instructions"=> "Continue onto <b>Av. A</b>",
                                    "polyline"=> [
                                        "points"=> "|wqyBlhumGHd@?B@R@PDb@DZBL@D@FFL@BFNJNBFDDLNNNJJJNDDBFDHBHFRBJBR?H?J?NCXEPGVI^O`@AFGLOX_@h@GHUZINEFEFABEHENCFETQp@Ib@EROt@WdC"
                                    ],
                                    "start_location"=> [
                                        "lat"=> -20.0846336,
                                        "lng"=> -44.3509531
                                    ],
                                    "travel_mode"=> "DRIVING"
                                ],
                                [
                                    "distance"=> [
                                        "text"=> "2.4 km",
                                        "value"=> 2360
                                    ],
                                    "duration"=> [
                                        "text"=> "7 mins",
                                        "value"=> 448
                                    ],
                                    "end_location"=> [
                                        "lat"=> -20.064749,
                                        "lng"=> -44.347548
                                    ],
                                    "html_instructions"=> "Turn <b>right</b> onto <b>R. Rio Grande do Sul</b>/<wbr/><b>R. Um</b>",
                                    "maneuver"=> "turn-right",
                                    "polyline"=> [
                                        "points"=> "duqyBxivmG_C]kC_@sIwAg@OgBk@SEaAYYIkA_@AAaAa@_@QGCuAm@]A[@sAi@WEQAMCwAO[Ey@Ks@KWGKCKCUKOIaBs@aCcA_Bs@CAkAg@o@WoAk@q@YCA[O_@Oe@Ui@SOGOGyAo@sAi@e@S]CqAo@YgAg@a@Qu@]u@[SISEOC[A]@i@OcCiAEECAg@UyAm@YMmCgAyBaAw@YIA"
                                    ],
                                    "start_location"=> [
                                        "lat"=> -20.084187,
                                        "lng"=> -44.3562924
                                    ],
                                    "travel_mode"=> "DRIVING"
                                ],
                                [
                                    "distance"=> [
                                        "text"=> "0.3 km",
                                        "value"=> 329
                                    ],
                                    "duration"=> [
                                        "text"=> "1 min",
                                        "value"=> 61
                                    ],
                                    "end_location"=> [
                                        "lat"=> -20.0660426,
                                        "lng"=> -44.3454056
                                    ],
                                    "html_instructions"=> "Turn <b>right</b>",
                                    "maneuver"=> "turn-right",
                                    "polyline"=> [
                                        "points"=> "t[myBdstmGAgACkA?ACiAAmA?G@IBEJERIxAi@fA[VIl@E"
                                    ],
                                    "start_location"=> [
                                        "lat"=> -20.064749,
                                        "lng"=> -44.347548
                                    ],
                                    "travel_mode"=> "DRIVING"
                                ],
                                [
                                    "distance"=> [
                                        "text"=> "0.1 km",
                                        "value"=> 101
                                    ],
                                    "duration"=> [
                                        "text"=> "1 min",
                                        "value"=> 22
                                    ],
                                    "end_location"=> [
                                        "lat"=> -20.0656116,
                                        "lng"=> -44.34456249999999
                                    ],
                                    "html_instructions"=> "Turn <b>left</b>",
                                    "maneuver"=> "turn-left",
                                    "polyline"=> [
                                        "points"=> "vcnyBxetmGQq@k@[@W[@"
                                    ],
                                    "start_location"=> [
                                        "lat"=> -20.0660426,
                                        "lng"=> -44.3454056
                                    ],
                                    "travel_mode"=> "DRIVING"
                                ]
                            ],
                            "traffic_speed_entry"=> [],
                            "via_waypoint"=> []
                        ]
                    ],
                    "overview_polyline"=> [
                        "points"=> "d|myB~`cmGqEBmD@AkCa@@gA?gA?sKB[LFcADgDfAeD`Aq@NeBLqB?s@GeAEa@Hq@ZyAvAeBtB[AlB[@jAaBzBe@l@i@^uBt@wFzAqF~AqHvB]GpBcKzCsBn@FZRx@`CfJVdAFh@@HKFSFo@R]HACECKEM@IFEJ?JDFHXhA|Cn@zALJTt@LRd@`Ab@pA\\hBhAjFXnAXj@Vn@f@zA`@|@HLNHNLVXXJ^^hAt@jAj@n@TxDvAr@\\~@h@fAx@hApAf@p@f@|@`@`Aj@rBv@nER~@Tt@l@nA`ApAnGfGhCrCrDtElI|KbMbPfDpEjF`HdDlDpChCfDfCdOnKxCpBnDbC~IhGlDbC\\ZNV~BdCHNBHz@j@bAr@l@xDfApGLd@d@lDEV@`@A?A@A@?F?B?NANaA`C_BhDkBhECFu@pBe@`AiA`C]nAw@dDiArGcAlF]@bEiAfGeAfGkAlGgBxJaBxIOz@Kr@Cx@AZ@v@TdEt@rLZxFv@rNLlB^lGJfAVnAX|@b@|@|A~Bf@v@`@v@b@zA|ApIb@rCn@jDV|@P^nAvBhCtDd@t@`@~@V~@b@|B`@pB^nB^nBj@~BR`@FTp@bAtA|BdAxAp@fARb@Z`AbAxGNZNR`@Z\\TrBjBr@d@zBjA^Nr@P|@d@vA~@hDpBvA^fAL|AHz@JjB`@dAb@rEtBr@Tl@NnDh@v@Dx@ElC[fB_@j@GP?JBNNFRVdCHlALv@\\p@hAvATr@Bx@Ij@Qv@Qh@Wf@gA~AS\\a@~A_@lBWdC_C]_NwBoC[@uA_@eBi@cAc@g@UuAm@]A[@sAi@WE_@EaFm@c@Ka@OqB]@aFwBoEmBqB[@oBy@qJ_EoEqBiAe@c@I[A]@i@OiCoA_DsAgGiCaA[I_FAuADO^O`DeAVIl@EQq@k@[@W[@"
                    ],
                    "summary"=> "BR-381",
                    "warnings"=> [],
                    "waypoint_order"=> []
                ]
            ],
            "status"=> "erro"
        ];
        $google = $this->createMock(GoogleApis::class);
        $google->method('requestDirections')->willReturn($response);
        $deliveryRouteController = new DeliveryRouteController($google);
        $cep = "32920-000";


        //expect
        $expects= ['error'=>'400'];


        //action
        $result=$deliveryRouteController->portage($cep);

        //assert
        $this->assertEquals($result, $expects);



    }
}
