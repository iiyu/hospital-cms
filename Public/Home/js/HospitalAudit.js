jQuery(function ($) {
    var hospital = {
        auditRank: null,
        html_audit: [],
        init: function () {
            auditRank = ['A', 'B', 'C', 'D', 'E'];
            var html_rdo = [];
            for (var i = 0; i < auditRank.length; i++) {
                html_rdo.push('<input type="radio" name="rdoAuditRank" value="' + (parseInt(i) + 1) + '"/>' + auditRank[i]);
            }
            this.html_audit.push('<div id="div_Hospitalaudit">');
            this.html_audit.push('  <h4>科室评审</h4>');
            this.html_audit.push('  <div class="inner">');
            this.html_audit.push('     <p class="first"> ');
            this.html_audit.push('        <label for="rdoAuditRank">审核结果</label> ' + html_rdo.join("") + '  </p>');
            this.html_audit.push('     <p class="">');
            this.html_audit.push('        <label for="txtAuditContent">审核意见</label>');
            this.html_audit.push('        <textarea id="txtAuditContent"></textarea>');
            this.html_audit.push('        <input type="hidden" id="txtChapterCode" /><input type="hidden" id="txtFlowID" /> ');
            this.html_audit.push('     </p>');
            this.html_audit.push('   </div>');
            this.html_audit.push('   <p class="submit"> ');
            this.html_audit.push('      <input type="button" class="btn_24" id="btnSave" value="保存" />&nbsp;&nbsp;<input type="button" class="btn_24" id="btnCancel" value="取消" /> ');
            this.html_audit.push('   </p>');
            this.html_audit.push('</div>');
            var chapters = $('span:first', 'dt.b1');
            var chapterList = [];
            for (var i = 0; i < chapters.length; i++) {
                chapterList.push($(chapters[i]).text());
            }
            $.ajax({
                url: "home/Index/getcat",
                type: 'POST',
                contentType: 'application/json',
                data: "{chapters:'" + chapterList.join('$') + "'}",
                dataType: 'json',
                success: hospital.showAuditBar
            });
        },
        showAuditBar: function (result) {
            if (!result) return;
            var chapterNodes = eval(result);
            if (!chapterNodes || chapterNodes.length == 0) return;

            var chapters = $('dt.b1');
            for (var i = 0; i < chapters.length; i++) {
                var chapterCode = $(chapters[i]).find('span').first().text();
                for (var j = 0; j < chapterNodes.length; j++) {
                    if (chapterNodes[j].Chapter == chapterCode) {
                        var html = [];
                        html.push('<div class="Hospitalaudit" id="div_' + chapterCode + '">');
                        html.push('<ul>');
                        for (var k = 0; k < chapterNodes[j].FlowList.length; k++) {
                            var flowName = chapterNodes[j].FlowList[k].FlowName;
                            var flowId = chapterNodes[j].FlowList[k].FlowId;
                            var rank = chapterNodes[j].FlowList[k].Rank == 0 ? "未审" : hospital.getRankName(auditRank[chapterNodes[j].FlowList[k].Rank - 1]);
                            var available = chapterNodes[j].FlowList[k].Available;
                            var isComment = chapterNodes[j].FlowList[k].IsComment;

                            html.push('<li><span>' + flowName + '</span>');
                            if (!isComment) {
                                html.push('<input type="button" class="status_button" flowId="' + flowId + '" id="btn' + flowId + '_' + chapterCode + '" value="' + rank + '"></input>');
                            }
                            else {
                                html.push('<input type="button" class="status_button_audited" flowId="' + flowId + '" id="btn' + flowId + '_' + chapterCode + '" value="' + rank + '"></input>');
                            }
                            if (available) {
                                html.push('&nbsp;<input type="button" class="audit_button" flowId="' + flowId + '" id="btnP' + flowId + '_' + chapterCode + '" value="评审"></input>');
                            }
                            html.push('</li>');
                        }
                        html.push('</ul></div>');
                        $(chapters[i]).append(html.join(""));
                    }
                }
            } //end for

            hospital.bindOpen();
            hospital.bindTips();
        },
        getRankName: function (rankName) {
            if (rankName) {
                return rankName;
                //return rankName.substr(2, rankName.length - 2);
            }
            else {
                return "";
            }
        },
        saveAudit: function () {
            var auditData = {};
            auditData.flowId = $('#txtFlowID').val();
            auditData.chapter = $('#txtChapterCode').val();
            auditData.content = $('#txtAuditContent').val();
            auditData.rank = $(":radio[name='rdoAuditRank']:checked").val();
            if (!auditData.rank) { alert('请选择评审结果!'); return; }
            $.ajax({
                url: '/WebService/AjaxMothed.asmx/SaveHospitalAudit',
                type: 'POST',
                contentType: 'application/json',
                data: obj2str(auditData),
                dataType: 'json',
                success: function (data) {
                    if (data) {
                        var ret = eval('(' + data + ')');
                        var btn = document.getElementById('btn' + auditData.flowId + '_' + auditData.chapter);
                        if (btn) {
                            btn.value = hospital.getRankName(auditRank[ret.Rank - 1]);
                            if (auditData.content.length > 0) {
                                $(btn).removeClass("status_button");
                                $(btn).addClass("status_button_audited");
                            }
                            else {
                                $(btn).removeClass("status_button_audited");
                                $(btn).addClass("status_button");
                            }
                        }
                    }
                }
            });
            $('#btnCancel').click();
        },
        bindOpen: function () {
            $('.audit_button').each(function () {
                var chapterCode = $(this).attr("id").split('_')[1];
                var fid = $(this).attr("flowId");
                $(this).qtip({
                    id: 'modal',
                    content: {
                        text: "正在读取数据...",
                        title: {
                            text: '填写评审信息',
                            button: true
                        },
                        ajax: {
                            cache: false,
                            once: false,
                            url: '2.php',
                            type: 'POST',
                            contentType: 'application/json',
                            data: '{flowId:' + fid + ',chapter:"' + chapterCode + '"}',
                            dataType: 'json',
                            success: function (data, status) {
                                $("#div_Hospitalaudit").remove();
                                this.set('content.text', hospital.html_audit.join(""));
                                $('#btnCancel').click(function () { $('.qtip').qtip('hide'); });
                                $('#txtChapterCode').val(chapterCode);
                                $('#txtFlowID').val(fid);
                                if (data) {
                                    var ret = eval('(' + data + ')');
                                    $('input[name=rdoAuditRank][value=' + ret.Rank + ']').attr('checked', true);
                                    $('#txtAuditContent').val(ret.Content);
                                    $('h4:first', '#div_Hospitalaudit').text(ret.FlowName);
                                    if (!ret.Available) {
                                        $('#btnSave').css('display', 'none');
                                    }
                                    $('#btnSave').click(function () { hospital.saveAudit(); });
                                }
                            }
                        }
                    },
                    position: {
                        my: 'center',
                        at: 'center',
                        target: $(window)
                    },
                    style: {
                        tip: false,
                        classes: 'qtip-blue qtip-rounded qtip-shadow'
                    },
                    show: {
                        event: "click",
                        solo: true,
                        modal: {
                            on: true,
                            blur: false,
                            escape: false
                        }
                    },
                    hide: false
                });
            })
        },
        bindTips: function () {
            $('.status_button').add('.status_button_audited').each(function () {
                var chapterCode = $(this).attr("id").split('_')[1];
                var flowId = $(this).attr("flowId");
                $(this).qtip({
                    content: {
                        text: "正在读取数据...",
                        title: {
                            text: '评审意见',
                            button: true
                        },
                        ajax: {
                            url: "home/Index/getone",
                            type: "GET",
                            data: { Chapter: chapterCode, FlowID: flowId },
                            cache: false,
                            once: false,
                            loading: false
                        }
                    },
                    position: {
                        my: 'left top',
                        at: 'right top'
                    },
                    style: {
                        tip: false,
                        classes: 'qtip-shadow qtip-tipped'
                    },
                    show: {
                        event: 'click'
                    },
                    hide: false
                });
            });
        }
    }
    hospital.init();
});


//将js对象转换为json字符串  
function obj2str(o) {
    var r = [];
    if (typeof o == "string") return "\"" + o.replace(/([\'\"\\])/g, "\\$1").replace(/(\n)/g, " \\n").replace(/(\r)/g, "\\r").replace(/(\t)/g, "\\t") + "\"";
    if (typeof o == "undefined") return "";
    if (typeof o == "object") {
        if (o === null) return "null";
        else if (!o.sort) {
            for (var i in o) {
                r.push("\"" + i + "\":" + obj2str(o[i]))
            }
            r = "{" + r.join() + "}"
        } else {
            for (var i = 0; i < o.length; i++)
                r.push(obj2str(o[i]))
            r = "[" + r.join() + "]"
        }
        return r;
    }
    return o.toString();
}