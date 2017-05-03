(function() {
    tinymce.create('tinymce.plugins.Codebutton', {
        init : function(ed, url) {
            ed.addButton('codebutton', {
                title : 'Code',
                cmd : 'codebutton',
                icon: 'code'
            });

            ed.addCommand('codebutton', function() {
                var selected_text = trim(ed.selection.getContent());
                var return_text = '';
                if(selected_text.length > 0){
                    return_text = '&nbsp;<pre><code>' + selected_text + '</code></pre>&nbsp;';
                }else{
                    return_text = '&nbsp;<pre><code>Code goes here...</code></pre>&nbsp;';
                }
                ed.execCommand('mceInsertContent', 0, return_text);
            });
        },
        createControl : function(n, cm) {
            return null;
        },
        getInfo : function() {
            return {
                longname : 'Code Button',
                author : 'Matthew McCoy',
                authorurl : 'http://mattmc.co/y',
                version : "1.0"
            };
        }
    });
    // Register plugin
    tinymce.PluginManager.add( 'cb', tinymce.plugins.Codebutton );
})();