<?php if (!defined('FEE_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo ($appini["sysconfig"]["web_name"]); ?>后台管理中心</title>
<?php 
echo helper_view::addCss(array('admin/css/base.css','admin/css/style.css'),1,1);
echo helper_view::addJs(array('admin/js/jquery-1.8.3.min.js', 'admin/js/common.js','admin/js/formvalidator/formvalidator.js','admin/js/formvalidator/formvalidator_regex.js'),1,1);
echo helper_view::addJsCode('',1,1);
?>
<script type="text/javascript" src="<?php echo ($url["admin_tpl"]); ?>/js/dialog/dialog.js?_v=<?php echo ($appini["web_version"]); ?>"></script>
</head>
<body<?php echo empty($body_style) ? '' : $body_style; ?>>
<script type="text/javascript" src="<?php echo ($url["admin_tpl"]); ?>/js/highcharts/highcharts.js?_v=<?php echo ($appini["web_version"]); ?>"></script>
<div class="pad-10">
    <div class="explain-col mar-b8" id="search_form">
        <form name="search_form" action="" method="post" id="search_form">
            报表类型:
            <select id="charttype">
                <option value="line" <?php if ($charttype == 'line') echo 'selected="selected"' ?>>线状图</option>
                <option value="area" <?php if ($charttype == 'area') echo 'selected="selected"' ?>>面积图</option>
                <option value="column" <?php if ($charttype == 'column') echo 'selected="selected"' ?>>柱状图(纵向)</option>
                <option value="bar" <?php if ($charttype == 'bar') echo 'selected="selected"' ?>>柱状图(横向)</option>
                <!--<option value="pie" <?php /* if ($charttype == 'pie') echo 'selected="selected"' */ ?>>饼图</option>-->
                <option value="scatter" <?php if ($charttype == 'scatter') echo 'selected="selected"' ?>>点状图</option>
            </select>
            周期类型:
            <select name="search[type]" id="stat-cycel">
                <?php if(is_array($stat_cycel)): foreach($stat_cycel as $k=>$v): ?><option value="<?php echo ($k); ?>" <?= $k == $type ? "selected" : ""?>><?php echo ($v); ?></option><?php endforeach; endif; ?>
            </select>
            &nbsp;
            客户端：
            <input name="search[name]" type="text" class="input-text" value="<?php echo ($name); ?>" size="16" />
            <input type="submit" name="dosubmit" class="button" value="搜索" />
        </form>
    </div>
    <fieldset>
        <legend><?php echo ($title); ?></legend>
        <div class="table-form">
            <div id="container_day" style="min-width:700px;height:400px"></div>
        </div>
    </fieldset>
    <div class="bk10"></div>
    <!--<fieldset>
        <legend>消费金额周统计</legend>
        <div class="table-form">
            <div id="container_week" style="min-width:700px;height:400px"></div>
        </div>
    </fieldset>
    <div class="bk10"></div>
    <fieldset>
        <legend>消费金额月统计</legend>
        <div class="table-form">
            <div id="container_month" style="min-width:700px;height:400px"></div>
        </div>
    </fieldset>
    <div class="bk10"></div>-->
</div>
<script type="text/javascript">
    $(function () {
        $("#charttype").change(function(){
            var href = window.location.href;
            href = href.slice(0,href.indexOf('?') == -1 ? href.length : href.indexOf('?'));
            window.location.href = href + '?charttype=' + $(this).val();
        });
        var charttype = '<?php echo ($charttype); ?>';
        var x_date = <?php echo ($x_date); ?>;
        var y_amount = <?php echo ($y_amount); ?>;
        var y_degreen = <?php echo ($y_degreen); ?>;
        $('#container_day').highcharts({
            chart: {
                    type: charttype
            },
            title: {
                text: '',
                x: -20 //center
            },
            subtitle: {
                text: '',
                x: -20
            },
            xAxis: {
                categories: x_date
            },
            yAxis: {
                title: {
                    text: '',
                    x: -20 //center
                },
                title: {
                    text: '<?php echo ($y_title); ?>'
                },
                plotLines: [{
                        value: 0,
                        width: 1,
                        color: '#808080'
                    }]
            },
            tooltip: {
                valueSuffix: '元'
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            series: [{
                    name: '消费金额',
                    data: y_amount.amount,
                    tooltip: {
                        valueSuffix: ' 元'
                    }
                },{
                    name: '抓取次数',
                    data: y_degreen.degreen,
                    tooltip: {
                        valueSuffix: ' 次'
                    }
            }]
        });
    });
</script>
</body>
</html>