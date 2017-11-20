<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link href="../css/jquery-accordion-menu.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="../fonts/font-awesome/css/font-awesome.min.css">

    <link href="../css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/main.css"/>
    <!--<script src="../js/jquery-3.1.1.js"></script>-->
    <script src="../js/jquery-1.7.1.js" type="text/javascript" charset="utf-8"></script>
    <script src="../js/jquery-accordion-menu.js" type="text/javascript"></script>

    <script type="text/javascript"></script>

    <style type="text/css">
        * {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
        }

        html, body {
            background: #f2f2f2;
            height: 100%;
            min-height: 100%;
            /*overflow: auto;*/

        }

        body:after {
            content: '';
            height: 100%;
            width: 1px;
            position: fixed;
            left: 198px;
            top: 0;
            background: #AD0000;
        }

        .filterinput {
            background-color: rgba(249, 244, 244, 0);
            border-radius: 15px;
            width: 90%;
            height: 30px;
            border: thin solid #FFF;
            text-indent: 0.5em;
            font-weight: bold;
            color: #FFF;
        }

        /*.right-bg{
            width: 10px;
            height: 100%;
            background: #000;
            /*display: inline-block;*/
        /*float: left;*/
        }
        #content {

        }

        /*.jquery-accordion-menu{
            float:right;
            width: 210px !important;
        }*/
    </style>

</head>

<body>
<div class="right-bg">

</div>

<div id="jquery-accordion-menu" class="jquery-accordion-menu red">
    <p class="system-m">系统菜单</p>

    <ul>
        <li class=""><a href="#"><i class="l-icon icon-zuzhi"></i>组织管理</a>
            <ul class="submenu">
                <li><a href="#">组织发展</a>
                    <ul class="submenu">
                        <li><a href="#">中心发展</a>
                            <ul class="submenu">
                                <li><a href="../pre_member.php?branch=中心">预备党员</a></li>
                                <li><a href="../develop_member.php?branch=中心">发展对象</a></li>
                                <li><a href="../active_member.php?branch=中心">积极分子</a></li>
                                <li><a href="../application_member.php?branch=中心">申请入党</a></li>
                            </ul>
                        </li>
                        <li><a href="#">机关党支部</a>
                            <ul class="submenu">
                                <li><a href="../pre_member.php?branch=机关党支部">预备党员</a></li>
                                <li><a href="../develop_member.php?branch=机关党支部">发展对象</a></li>
                                <li><a href="../active_member.php?branch=机关党支部">积极分子</a></li>
                                <li><a href="../application_member.php?branch=机关党支部">申请入党</a></li>
                            </ul>
                        </li>
                        <li><a href="#">通信室党支部</a>
                            <ul class="submenu">
                                <li><a href="../pre_member.php?branch=通信室党支部">预备党员</a></li>
                                <li><a href="../develop_member.php?branch=通信室党支部">发展对象</a></li>
                                <li><a href="../active_member.php?branch=通信室党支部">积极分子</a></li>
                                <li><a href="../application_member.php?branch=通信室党支部">申请入党</a></li>
                            </ul>
                        </li>
                        <li><a href="#">通信运行室党支部</a>
                            <ul class="submenu">
                                <li><a href="../pre_member.php?branch=通信运行室党支部">预备党员</a></li>
                                <li><a href="../develop_member.php?branch=通信运行室党支部">发展对象</a></li>
                                <li><a href="../active_member.php?branch=通信运行室党支部">积极分子</a></li>
                                <li><a href="../application_member.php?branch=通信运行室党支部">申请入党</a></li>
                            </ul>
                        </li>
                        <li><a href="#">自动化数据室党支部</a>
                            <ul class="submenu">
                                <li><a href="../pre_member.php?branch=自动化数据室党支部">预备党员</a></li>
                                <li><a href="../develop_member.php?branch=自动化数据室党支部">发展对象</a></li>
                                <li><a href="../active_member.php?branch=自动化数据室党支部">积极分子</a></li>
                                <li><a href="../application_member.php?branch=自动化数据室党支部">申请入党</a></li>
                            </ul>
                        </li>
                        <li><a href="#">雷达室党支部</a>
                            <ul class="submenu">
                                <li><a href="../pre_member.php?branch=雷达室党支部">预备党员</a></li>
                                <li><a href="../develop_member.php?branch=雷达室党支部">发展对象</a></li>
                                <li><a href="../active_member.php?branch=雷达室党支部">积极分子</a></li>
                                <li><a href="../application_member.php?branch=雷达室党支部">申请入党</a></li>
                            </ul>
                        </li>
                        <li><a href="#">导航室党支部</a>
                            <ul class="submenu">
                                <li><a href="../pre_member.php?branch=导航室党支部">预备党员</a></li>
                                <li><a href="../develop_member.php?branch=导航室党支部">发展对象</a></li>
                                <li><a href="../active_member.php?branch=导航室党支部">积极分子</a></li>
                                <li><a href="../application_member.php?branch=导航室党支部">申请入党</a></li>
                            </ul>
                        </li>
                        <li><a href="#">航路导航室党支部</a>
                            <ul class="submenu">
                                <li><a href="../pre_member.php?branch=航路导航室党支部">预备党员</a></li>
                                <li><a href="../develop_member.php?branch=航路导航室党支部">发展对象</a></li>
                                <li><a href="../active_member.php?branch=航路导航室党支部">积极分子</a></li>
                                <li><a href="../application_member.php?branch=航路导航室党支部">申请入党</a></li>
                            </ul>
                        </li>
                        <li><a href="#">供电室党支部</a>
                            <ul class="submenu">
                                <li><a href="../pre_member.php?branch=供电室党支部">预备党员</a></li>
                                <li><a href="../develop_member.php?branch=供电室党支部">发展对象</a></li>
                                <li><a href="../active_member.php?branch=供电室党支部">积极分子</a></li>
                                <li><a href="../application_member.php?branch=供电室党支部">申请入党</a></li>
                            </ul>
                        </li>
                        <li><a href="#">维修室党支部</a>
                            <ul class="submenu">
                                <li><a href="../pre_member.php?branch=维修室党支部">预备党员</a></li>
                                <li><a href="../develop_member.php?branch=维修室党支部">发展对象</a></li>
                                <li><a href="../active_member.php?branch=维修室党支部">积极分子</a></li>
                                <li><a href="../application_member.php?branch=维修室党支部">申请入党</a></li>
                            </ul>
                        </li>
                        <li><a href="#">现场车队党支部</a>
                            <ul class="submenu">
                                <li><a href="../pre_member.php?branch=现场车队党支部">预备党员</a></li>
                                <li><a href="../develop_member.php?branch=现场车队党支部">发展对象</a></li>
                                <li><a href="../active_member.php?branch=现场车队党支部">积极分子</a></li>
                                <li><a href="../application_member.php?branch=现场车队党支部">申请入党</a></li>
                            </ul>
                        </li>


                    </ul>
                </li>
                <li><a href="#">党员信息</a>
                    <ul class="submenu">
                        <li><a href="#">机关党支部</a>
                            <ul class="submenu">
                                <li><a href="../sectorinfo/office.php?branch=机关党支部">支部概述</a></li>
                                <li><a href="../member.php?branch=机关党支部">党员概述</a></li>
                            </ul>
                        </li>
                        <li><a href="#">通信室党支部</a>
                            <ul class="submenu">
                                <li><a href="../sectorinfo/office.php?branch=通信室党支部">支部概述</a></li>
                                <li><a href="../member.php?branch=通信室党支部">党员概述</a>
                            </ul>
                        </li>
                        <li><a href="#">通信运行室党支部</a>
                            <ul class="submenu">
                                <li><a href="../sectorinfo/office.php?branch=通信运行室党支部">支部概述</a></li>
                                <li><a href="../member.php?branch=通信运行室党支部">党员概述</a></li>
                            </ul>
                        </li>
                        <li><a href="#">自动化数据室党支部</a>
                            <ul class="submenu">
                                <li><a href="../sectorinfo/office.php?branch=自动化数据室党支部">支部概述</a></li>
                                <li><a href="../member.php?branch=自动化数据室党支部">党员概述</a></li>

                            </ul>
                        </li>
                        <li><a href="#">雷达室党支部</a>
                            <ul class="submenu">
                                <li><a href="../sectorinfo/office.php?branch=雷达室党支部">支部概述</a></li>
                                <li><a href="../member.php?branch=雷达室党支部">党员概述</a></li>

                            </ul>
                        </li>
                        <li><a href="#">导航室党支部</a>
                            <ul class="submenu">
                                <li><a href="../sectorinfo/office.php?branch=导航室党支部">支部概述</a></li>
                                <li><a href="../member.php?branch=导航室党支部">党员概述</a></li>

                            </ul>
                        </li>
                        <li><a href="#">航路导航室党支部</a>
                            <ul class="submenu">
                                <li><a href="../sectorinfo/office.php?branch=航路导航室党支部">支部概述</a></li>
                                <li><a href="../member.php?branch=航路导航室党支部">党员概述</a></li>

                            </ul>
                        </li>
                        <li><a href="#">供电室党支部</a>
                            <ul class="submenu">
                                <li><a href="../sectorinfo/office.php?branch=供电室党支部">支部概述</a></li>
                                <li><a href="../member.php?branch=供电室党支部">党员概述</a></li>

                            </ul>
                        </li>
                        <li><a href="#">维修室党支部</a>
                            <ul class="submenu">
                                <li><a href="../sectorinfo/office.php?branch=维修室党支部">支部概述</a></li>
                                <li><a href="../member.php?branch=维修室党支部">党员概述</a>
                            </ul>
                        </li>
                        <li><a href="#">现场车队党支部</a>
                            <ul class="submenu">
                                <li><a href="../sectorinfo/office.php?branch=现场车队党支部">支部概述</a></li>
                                <li><a href="#">党员概述</a>
                                    <ul class="submenu">
                                        <li><a href="../member.php?branch=现场车队党支部">党员</a></li>
                                        <li><a href="../pre_member.php?branch=现场车队党支部">预备党员</a></li>
                                        <li><a href="../develop_member.php?branch=现场车队党支部">发展对象</a></li>
                                        <li><a href="../active_member.php?branch=现场车队党支部">积极分子</a></li>
                                        <li><a href="../application_member.php?branch=现场车队党支部">申请入党</a></li>
                                    </ul>
                                </li>

                            </ul>
                        </li>
                    </ul>
                </li>

                <li><a href="#">党费管理</a>
                    <ul class="submenu">
                        <li><a href="../feeinfo_new.php?branch=机关党支部">机关党支部</a></li>
                        <li><a href="../feeinfo_new.php?branch=通信室党支部">通信室党支部</a></li>
                        <li><a href="../feeinfo_new.php?branch=通信运行室党支部">通信运行室党支部</a></li>
                        <li><a href="../feeinfo_new.php?branch=自动化数据室党支部">自动化数据室党支部</a></li>
                        <li><a href="../feeinfo_new.php?branch=雷达室党支部">雷达室党支部</a></li>
                        <li><a href="../feeinfo_new.php?branch=导航室党支部">导航室党支部</a></li>
                        <li><a href="../feeinfo_new.php?branch=航路导航室党支部">航路导航室党支部</a></li>
                        <li><a href="../feeinfo_new.php?branch=供电室党支部">供电室党支部</a></li>
                        <li><a href="../feeinfo_new.php?branch=维修室党支部">维修室党支部</a></li>
                        <li><a href="../feeinfo_new.php?branch=现场车队党支部">现场车队党支部</a></li>
                    </ul>
                </li>


            </ul>
        </li>

        <li><a href="#"><i class="l-icon icon-renw"></i>党建考核</a>
            <ul class="submenu">
                <li><a href="../plans/problemProgramUnit.html">问题导向类</a></li>
                <li><a href="../plans/studyActUnit.html">基础规范类</a></li>
                <li><a href="#">任务推送</a>
                    <ul class="submenu">
                        <li><a href="../mission.php?type=定期任务">定期任务</a></li>
                        <li><a href="#">不定期任务</a>
                            <ul class="submenu">
                                <li><a href="../rush_mission.php?type=抢接任务">抢接任务</a></li>
                                <li><a href="../mission.php?type=指定任务">指定任务</a></li>
                            </ul>
                        </li>
                        <li><a href="../mission.php?type=亮点工作">亮点工作</a></li>
                    </ul>
                </li>
            </ul>
        </li>

        <li><a href="#"><i class="l-icon icon-pmin"></i>排名统计</a>
            <ul class="submenu">
                <li><a href="#">分类赋分</a>
                    <ul class="submenu">
                        <li><a href="../calculation/fixedCalculation.php">定期任务得分</a></li>
                        <li><a href="../calculation/unfixedCalculation.php">不定期任务得分</a></li>
                        <li><a href="../calculation/shinningCalculation.php">亮点工作得分</a></li>
                        <li><a href="../partyCommitteeList.php">党委评价</a></li>
                    </ul>
                </li>
                <li><a href="#">排名统计</a>
                    <ul class="submenu">
                        <li><a href="#">月度</a>
                            <ul class="submenu">
                                <li><a href="../monthBranchRank.php">党支部排名</a></li>
                                <li><a href="../monthSecretaryRank.php">党支部书记排名</a></li>
                            </ul>
                        </li>
                        <li><a href="#">年度</a>
                            <ul class="submenu">
                                <li><a href="../yearBranchRank.php">党支部排名</a></li>
                                <li><a href="../yearSecretaryRank.php">党支部书记排名</a></li>
                            </ul>
                        </li>
                    </ul>

                </li>
            </ul>
        </li>

        <li><a href="#"><i class="icon-duiwu"></i>队伍建设</a>
            <ul class="submenu">
                <li><a href="#">三鹰人才选拔</a>
                    <ul class="submenu">
                        <li><a href="../eagles/pickup.php?type=翔鹰">翔鹰</a></li>
                        <li><a href="../eagles/pickup.php?type=精鹰">精鹰</a></li>
                        <li><a href="../eagles/pickup.php?type=雏鹰">雏鹰</a></li>
                    </ul>
                </li>
                <li><a href="#">三鹰人才培养</a>
                    <ul class="submenu">
                        <li><a href="../eagles/eaglesTrainningUnit.php?type=翔鹰">翔鹰</a></li>
                        <li><a href="../eagles/eaglesTrainningUnit.php?type=精鹰">精鹰</a></li>
                        <li><a href="../eagles/eaglesTrainningUnit.php?type=雏鹰">雏鹰</a></li>
                    </ul>
                </li>
            </ul>
        </li>

        <li><a href="#"><i class="l-icon icon-jihua"></i>日常管理</a>
            <ul class="submenu">
                <li><a href="../plans/preYearPlanUnit.html">年初计划</a></li>
                <li><a href="../plans/monthPlanUnit.html">月度总结</a></li>
                <li><a href="../plans/seasonPlanUnit.html">季度总结</a></li>
                <li><a href="../plans/endYearUnit.html">年终述职</a></li>
                <li><a href="../plans/saftyReportUnit.html">安全态势分析</a></li>
                <li><a href="../plans/studyUnit.html">理论学习</a></li>

            </ul>
        </li>

        <li><a href="#"><i class="l-icon icon-xinw"></i>新闻宣传</a>
            <ul class="submenu">
                <li><a href="../propaganda/outPropaganda.php">外媒宣传</a></li>
                <li><a href="../propaganda/inPropaganda.php">内媒宣传</a></li>
                <li><a href="../propaganda/union.php">工会宣传</a></li>
            </ul>
        </li>

        <li><a href="../propaganda/affairsInfo.php"><i class="l-icon icon-zhenw"></i>政务信息</a>
        </li>

        <li><a href="#"><i class="icon-tuandui"></i>团建管理</a>
            <ul class="submenu">
                <li><a href="../league/classUnit.php">团课</a></li>
                <li><a href="../league/leaderUnit.php">支委会</a></li>
                <li><a href="../league/memberUnit.php">团员大会</a></li>
                <li><a href="../league/teamUnit.php">团小组会</a></li>
                <li><a href="../league/livingUnit.php">组织生活会</a></li>
                <li><a href="../league/seasonPlanUnit.php">季度计划</a></li>
                <li><a href="../league/brandUnit.php">品牌活动</a></li>
                <li><a href="../league/youthTraceUnit.php">青春航迹</a></li>
                <li><a href="../league/youthStoryUnit.php">青春故事汇</a></li>
            </ul>
        </li>

        <li><a href="#"><i class="icon-fencai"></i>党风廉政</a>
            <ul class="submenu">
                <li><a href="../anti-corruption/caseStudy.php">案例学习</a></li>
                <li><a href="../anti-corruption/lawStudy.php">法规学习</a></li>
                <li><a href="../anti-corruption/purchase.php">小微采购</a></li>
            </ul>
        </li>
    </ul>

</div>


<script type="text/javascript">

    jQuery("#jquery-accordion-menu").jqueryAccordionMenu();
</script>

</body>
</html>
