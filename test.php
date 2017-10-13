<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>

<head>
    <title>首页</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <link href="./css/bootstrap.css" rel="stylesheet">

    <link href="./css/bootstrap.min.css" rel="stylesheet"/>
    <link href="./css/style.css" rel="stylesheet"/>

    <!--<script src="./js/jquery-3.2.1.min.js"></script>-->
    <script src="../js/jquery-1.7.1.js" type="text/javascript" charset="utf-8"></script>
    <style type="text/css">

    </style>
    <script type="text/javascript">
        $(function () {
            $('.tree li:has(ul)').addClass('parent_li').find(' > span').attr('title', 'Collapse this branch');
            $('.tree li.parent_li > span').on('click', function (e) {
                var children = $(this).parent('li.parent_li').find(' > ul > li');
                if (children.is(":visible")) {
                    children.hide('fast');
                    $(this).attr('title', 'Expand this branch').find(' > i').addClass('icon-plus-sign').removeClass('icon-minus-sign');
                } else {
                    children.show('fast');
                    $(this).attr('title', 'Collapse this branch').find(' > i').addClass('icon-minus-sign').removeClass('icon-plus-sign');
                }
                e.stopPropagation();
            });
            $('.tree li.parent_li > span').click();
        });

    </script>
</head>
<body>
<div class="tree well">
    <ul>
        <li>
            <span><i class="glyphicon glyphicon-th-list"></i> 组织管理</span>
            <ul>
                <li>
                    <span><i class="glyphicon glyphicon-plus-sign"></i> 机关党支部</span>
                    <ul>
                        <li>
                            <span><i class="glyphicon glyphicon-info-sign"></i> <a href="./sectorinfo/office.html">支部概述</a></span>
                        </li>
                        <li>
                            <span><i class="glyphicon glyphicon-user"></i> 个人信息</span>
                            <ul>
                                <li>
                                    <span><i class="glyphicon glyphicon-star"></i> <a href="./member.php?branch=机关党支部">党员</a></span>
                                </li>
                                <li>
                                    <span><i class="glyphicon glyphicon-star-empty"></i> <a href="./pre_member.php?branch=机关党支部">预备党员</a></span>
                                </li>
                                <li>
                                    <span><i class="glyphicon glyphicon-ok"></i> <a href="./develop_member.php?branch=机关党支部">发展对象</a></span>
                                </li>
                                <li>
                                    <span><i class="glyphicon glyphicon-time"></i> <a href="./active_member.php?branch=机关党支部">积极分子</a></span>
                                </li>
                                <li>
                                    <span><i class="glyphicon glyphicon-envelope"></i> <a href="./application_member.php?branch=机关党支部">申请入党</a></span>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <span><i class="glyphicon glyphicon-yen"></i> <a href="./feeinfo.php?branch=机关党支部">党费信息</a></span>
                        </li>
                    </ul>
                </li>

                <li>
                    <span><i class="glyphicon glyphicon-plus-sign"></i> 通信室党支部</span>
                    <ul>
                        <li>
                            <span><i class="glyphicon glyphicon-info-sign"></i> <a href="./sectorinfo/communication.html">支部概述</a></span>
                        </li>
                        <li>
                            <span><i class="glyphicon glyphicon-user"></i> 个人信息</span>
                            <ul>
                                <li>
                                    <span><i class="glyphicon glyphicon-star"></i> <a href="./member.php?branch=通信室党支部">党员</a></span>
                                </li>
                                <li>
                                    <span><i class="glyphicon glyphicon-star-empty"></i> <a href="./pre_member.php?branch=通信室党支部">预备党员</a></span>
                                </li>
                                <li>
                                    <span><i class="glyphicon glyphicon-ok"></i> <a href="./develop_member.php?branch=通信室党支部">发展对象</a></span>
                                </li>
                                <li>
                                    <span><i class="glyphicon glyphicon-time"></i> <a href="./active_member.php?branch=通信室党支部">积极分子</a></span>
                                </li>
                                <li>
                                    <span><i class="glyphicon glyphicon-envelope"></i> <a href="./application_member.php?branch=通信室党支部">申请入党</a></span>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <span><i class="glyphicon glyphicon-yen"></i> <a href="./feeinfo.php?branch=通信室党支部">党费信息</a></span>
                        </li>
                    </ul>
                </li>

                <li>
                    <span><i class="glyphicon glyphicon-plus-sign"></i> 通信运行室党支部</span>
                    <ul>
                        <li>
                            <span><i class="glyphicon glyphicon-info-sign"></i> <a href="./sectorinfo/commuRun.html">支部概述</a></span>
                        </li>
                        <li>
                            <span><i class="glyphicon glyphicon-user"></i> 个人信息</span>
                            <ul>
                                <li>
                                    <span><i class="glyphicon glyphicon-star"></i> <a href="./member.php?branch=通信运行室党支部">党员</a></span>
                                </li>
                                <li>
                                    <span><i class="glyphicon glyphicon-star-empty"></i> <a href="./pre_member.php?branch=通信运行室党支部">预备党员</a></span>
                                </li>
                                <li>
                                    <span><i class="glyphicon glyphicon-ok"></i> <a href="./develop_member.php?branch=通信运行室党支部">发展对象</a></span>
                                </li>
                                <li>
                                    <span><i class="glyphicon glyphicon-time"></i> <a href="./active_member.php?branch=通信运行室党支部">积极分子</a></span>
                                </li>
                                <li>
                                    <span><i class="glyphicon glyphicon-envelope"></i> <a href="./application_member.php?branch=通信运行室党支部">申请入党</a></span>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <span><i class="glyphicon glyphicon-yen"></i> <a href="./feeinfo.php?branch=通信运行室党支部">党费信息</a></span>
                        </li>
                    </ul>
                </li>

                <li>
                    <span><i class="glyphicon glyphicon-plus-sign"></i> 自动化数据室党支部</span>
                    <ul>
                        <li>
                            <span><i class="glyphicon glyphicon-info-sign"></i> <a href="./sectorinfo/automatic.html">支部概述</a></span>
                        </li>
                        <li>
                            <span><i class="glyphicon glyphicon-user"></i> 个人信息</span>
                            <ul>
                                <li>
                                    <span><i class="glyphicon glyphicon-star"></i> <a href="./member.php?branch=自动化数据室党支部">党员</a></span>
                                </li>
                                <li>
                                    <span><i class="glyphicon glyphicon-star-empty"></i> <a href="./pre_member.php?branch=自动化数据室党支部">预备党员</a></span>
                                </li>
                                <li>
                                    <span><i class="glyphicon glyphicon-ok"></i> <a href="./develop_member.php?branch=自动化数据室党支部">发展对象</a></span>
                                </li>
                                <li>
                                    <span><i class="glyphicon glyphicon-time"></i> <a href="./active_member.php?branch=自动化数据室党支部">积极分子</a></span>
                                </li>
                                <li>
                                    <span><i class="glyphicon glyphicon-envelope"></i> <a href="./application_member.php?branch=自动化数据室党支部">申请入党</a></span>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <span><i class="glyphicon glyphicon-yen"></i> <a href="./feeinfo.php?branch=自动化数据室党支部">党费信息</a></span>
                        </li>
                    </ul>
                </li>

                <li>
                    <span><i class="glyphicon glyphicon-plus-sign"></i> 雷达室党支部</span>
                    <ul>
                        <li>
                            <span><i class="glyphicon glyphicon-info-sign"></i> <a href="./sectorinfo/radar.html">支部概述</a></span>
                        </li>
                        <li>
                            <span><i class="glyphicon glyphicon-user"></i> 个人信息</span>
                            <ul>
                                <li>
                                    <span><i class="glyphicon glyphicon-star"></i> <a href="./member.php?branch=雷达室党支部">党员</a></span>
                                </li>
                                <li>
                                    <span><i class="glyphicon glyphicon-star-empty"></i> <a href="./pre_member.php?branch=雷达室党支部">预备党员</a></span>
                                </li>
                                <li>
                                    <span><i class="glyphicon glyphicon-ok"></i> <a href="./develop_member.php?branch=雷达室党支部">发展对象</a></span>
                                </li>
                                <li>
                                    <span><i class="glyphicon glyphicon-time"></i> <a href="./active_member.php?branch=雷达室党支部">积极分子</a></span>
                                </li>
                                <li>
                                    <span><i class="glyphicon glyphicon-envelope"></i> <a href="./application_member.php?branch=雷达室党支部">申请入党</a></span>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <span><i class="glyphicon glyphicon-yen"></i> <a href="./feeinfo.php?branch=雷达室党支部">党费信息</a></span>
                        </li>
                    </ul>
                </li>

                <li>
                    <span><i class="glyphicon glyphicon-plus-sign"></i> 导航室党支部</span>
                    <ul>
                        <li>
                            <span><i class="glyphicon glyphicon-info-sign"></i> <a href="./sectorinfo/navi.html">支部概述</a></span>
                        </li>
                        <li>
                            <span><i class="glyphicon glyphicon-user"></i> 个人信息</span>
                            <ul>
                                <li>
                                    <span><i class="glyphicon glyphicon-star"></i> <a href="./member.php?branch=导航室党支部">党员</a></span>
                                </li>
                                <li>
                                    <span><i class="glyphicon glyphicon-star-empty"></i> <a href="./pre_member.php?branch=导航室党支部">预备党员</a></span>
                                </li>
                                <li>
                                    <span><i class="glyphicon glyphicon-ok"></i> <a href="./develop_member.php?branch=导航室党支部">发展对象</a></span>
                                </li>
                                <li>
                                    <span><i class="glyphicon glyphicon-time"></i> <a href="./active_member.php?branch=导航室党支部">积极分子</a></span>
                                </li>
                                <li>
                                    <span><i class="glyphicon glyphicon-envelope"></i> <a href="./application_member.php?branch=导航室党支部">申请入党</a></span>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <span><i class="glyphicon glyphicon-yen"></i> <a href="./feeinfo.php?branch=导航室党支部">党费信息</a></span>
                        </li>
                    </ul>
                </li>

                <li>
                    <span><i class="glyphicon glyphicon-plus-sign"></i> 航路导航室党支部</span>
                    <ul>
                        <li>
                            <span><i class="glyphicon glyphicon-info-sign"></i> <a href="./sectorinfo/route.html">支部概述</a></span>
                        </li>
                        <li>
                            <span><i class="glyphicon glyphicon-user"></i> 个人信息</span>
                            <ul>
                                <li>
                                    <span><i class="glyphicon glyphicon-star"></i> <a href="./member.php?branch=航路导航室党支部">党员</a></span>
                                </li>
                                <li>
                                    <span><i class="glyphicon glyphicon-star-empty"></i> <a href="./pre_member.php?branch=航路导航室党支部">预备党员</a></span>
                                </li>
                                <li>
                                    <span><i class="glyphicon glyphicon-ok"></i> <a href="./develop_member.php?branch=航路导航室党支部">发展对象</a></span>
                                </li>
                                <li>
                                    <span><i class="glyphicon glyphicon-time"></i> <a href="./active_member.php?branch=航路导航室党支部">积极分子</a></span>
                                </li>
                                <li>
                                    <span><i class="glyphicon glyphicon-envelope"></i> <a href="./application_member.php?branch=航路导航室党支部">申请入党</a></span>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <span><i class="glyphicon glyphicon-yen"></i> <a href="./feeinfo.php?branch=航路导航室党支部">党费信息</a></span>
                        </li>
                    </ul>
                </li>

                <li>
                    <span><i class="glyphicon glyphicon-plus-sign"></i> 供电室党支部</span>
                    <ul>
                        <li>
                            <span><i class="glyphicon glyphicon-info-sign"></i> <a href="./sectorinfo/power.html">支部概述</a></span>
                        </li>
                        <li>
                            <span><i class="glyphicon glyphicon-user"></i> 个人信息</span>
                            <ul>
                                <li>
                                    <span><i class="glyphicon glyphicon-star"></i> <a href="./member.php?branch=供电室党支部">党员</a></span>
                                </li>
                                <li>
                                    <span><i class="glyphicon glyphicon-star-empty"></i> <a href="./pre_member.php?branch=供电室党支部">预备党员</a></span>
                                </li>
                                <li>
                                    <span><i class="glyphicon glyphicon-ok"></i> <a href="./develop_member.php?branch=供电室党支部">发展对象</a></span>
                                </li>
                                <li>
                                    <span><i class="glyphicon glyphicon-time"></i> <a href="./active_member.php?branch=供电室党支部">积极分子</a></span>
                                </li>
                                <li>
                                    <span><i class="glyphicon glyphicon-envelope"></i> <a href="./application_member.php?branch=供电室党支部">申请入党</a></span>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <span><i class="glyphicon glyphicon-yen"></i> <a href="./feeinfo.php?branch=供电室党支部">党费信息</a></span>
                        </li>
                    </ul>
                </li>

                <li>
                    <span><i class="glyphicon glyphicon-plus-sign"></i> 维修室党支部</span>
                    <ul>
                        <li>
                            <span><i class="glyphicon glyphicon-info-sign"></i> <a href="./sectorinfo/maintain.html">支部概述</a></span>
                        </li>
                        <li>
                            <span><i class="glyphicon glyphicon-user"></i> 个人信息</span>
                            <ul>
                                <li>
                                    <span><i class="glyphicon glyphicon-star"></i> <a href="./member.php?branch=维修室党支部">党员</a></span>
                                </li>
                                <li>
                                    <span><i class="glyphicon glyphicon-star-empty"></i> <a href="./pre_member.php?branch=维修室党支部">预备党员</a></span>
                                </li>
                                <li>
                                    <span><i class="glyphicon glyphicon-ok"></i> <a href="./develop_member.php?branch=维修室党支部">发展对象</a></span>
                                </li>
                                <li>
                                    <span><i class="glyphicon glyphicon-time"></i> <a href="./active_member.php?branch=维修室党支部">积极分子</a></span>
                                </li>
                                <li>
                                    <span><i class="glyphicon glyphicon-envelope"></i> <a href="./application_member.php?branch=维修室党支部">申请入党</a></span>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <span><i class="glyphicon glyphicon-yen"></i> <a href="./feeinfo.php?branch=维修室党支部">党费信息</a></span>
                        </li>
                    </ul>
                </li>

                <li>
                    <span><i class="glyphicon glyphicon-plus-sign"></i> 现场车队党支部</span>
                    <ul>
                        <li>
                            <span><i class="glyphicon glyphicon-info-sign"></i> <a href="./sectorinfo/motor.html">支部概述</a></span>
                        </li>
                        <li>
                            <span><i class="glyphicon glyphicon-user"></i> 个人信息</span>
                            <ul>
                                <li>
                                    <span><i class="glyphicon glyphicon-star"></i> <a href="./member.php?branch=现场车队党支部">党员</a></span>
                                </li>
                                <li>
                                    <span><i class="glyphicon glyphicon-star-empty"></i> <a href="./pre_member.php?branch=现场车队党支部">预备党员</a></span>
                                </li>
                                <li>
                                    <span><i class="glyphicon glyphicon-ok"></i> <a href="./develop_member.php?branch=现场车队党支部">发展对象</a></span>
                                </li>
                                <li>
                                    <span><i class="glyphicon glyphicon-time"></i> <a href="./active_member.php?branch=现场车队党支部">积极分子</a></span>
                                </li>
                                <li>
                                    <span><i class="glyphicon glyphicon-envelope"></i> <a href="./application_member.php?branch=现场车队党支部">申请入党</a></span>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <span><i class="glyphicon glyphicon-yen"></i> <a href="./feeinfo.php?branch=现场车队党支部">党费信息</a></span>
                        </li>
                    </ul>
                </li>




            </ul>
        </li>

        <li>
            <span><i class="glyphicon glyphicon-duplicate"></i> 任务推送</span>
            <ul>
                <li>
                    <span><i class="glyphicon glyphicon-paperclip"></i> 定期工作</span>
                </li>
            </ul>

            <ul>
                <li>
                    <span><i class="glyphicon glyphicon-random"></i> 不定期工作</span>
                    <ul>
                        <li>
                            <span><i class="glyphicon glyphicon-flag"></i> 抢接任务</span> <a href=""></a>
                        </li>
                    </ul>
                    <ul>
                        <li>
                            <span><i class="glyphicon glyphicon-flag"></i> 指定任务</span> <a href=""></a>
                        </li>
                    </ul>
                </li>
            </ul>

            <ul>
                <li>
                    <span><i class="glyphicon glyphicon-flag"></i> 亮点工作</span> <a href=""></a>
                </li>
            </ul>
        </li>




        <li>
            <span><i class="icon-folder-open"></i> 顶级节点2</span> <a href=""></a>
            <ul>
                <li>
                    <span><i class="icon-leaf"></i> 一级节点2_1</span> <a href=""></a>
                </li>
            </ul>
        </li>
    </ul>
</div>

</body>

</html>