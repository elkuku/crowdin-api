
window.projectVersion = 'master';

(function(root) {

    var bhIndex = null;
    var rootPath = '';
    var treeHtml = '        <ul>                <li data-name="namespace:ElKuKu" class="opened">                    <div style="padding-left:0px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="ElKuKu.html">ElKuKu</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:ElKuKu_Crowdin" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="ElKuKu/Crowdin.html">Crowdin</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:ElKuKu_Crowdin_Package" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="ElKuKu/Crowdin/Package.html">Package</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:ElKuKu_Crowdin_Package_Directory" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="ElKuKu/Crowdin/Package/Directory.html">Directory</a>                    </div>                </li>                            <li data-name="class:ElKuKu_Crowdin_Package_File" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="ElKuKu/Crowdin/Package/File.html">File</a>                    </div>                </li>                            <li data-name="class:ElKuKu_Crowdin_Package_Glossary" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="ElKuKu/Crowdin/Package/Glossary.html">Glossary</a>                    </div>                </li>                            <li data-name="class:ElKuKu_Crowdin_Package_Language" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="ElKuKu/Crowdin/Package/Language.html">Language</a>                    </div>                </li>                            <li data-name="class:ElKuKu_Crowdin_Package_Memory" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="ElKuKu/Crowdin/Package/Memory.html">Memory</a>                    </div>                </li>                            <li data-name="class:ElKuKu_Crowdin_Package_Project" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="ElKuKu/Crowdin/Package/Project.html">Project</a>                    </div>                </li>                            <li data-name="class:ElKuKu_Crowdin_Package_Translation" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="ElKuKu/Crowdin/Package/Translation.html">Translation</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="class:ElKuKu_Crowdin_Crowdin" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="ElKuKu/Crowdin/Crowdin.html">Crowdin</a>                    </div>                </li>                            <li data-name="class:ElKuKu_Crowdin_Languagefile" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="ElKuKu/Crowdin/Languagefile.html">Languagefile</a>                    </div>                </li>                            <li data-name="class:ElKuKu_Crowdin_Languageproject" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="ElKuKu/Crowdin/Languageproject.html">Languageproject</a>                    </div>                </li>                            <li data-name="class:ElKuKu_Crowdin_Package" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="ElKuKu/Crowdin/Package.html">Package</a>                    </div>                </li>                </ul></div>                </li>                </ul></div>                </li>                </ul>';

    var searchTypeClasses = {
        'Namespace': 'label-default',
        'Class': 'label-info',
        'Interface': 'label-primary',
        'Trait': 'label-success',
        'Method': 'label-danger',
        '_': 'label-warning'
    };

    var searchIndex = [
                    
            {"type": "Namespace", "link": "ElKuKu.html", "name": "ElKuKu", "doc": "Namespace ElKuKu"},{"type": "Namespace", "link": "ElKuKu/Crowdin.html", "name": "ElKuKu\\Crowdin", "doc": "Namespace ElKuKu\\Crowdin"},{"type": "Namespace", "link": "ElKuKu/Crowdin/Package.html", "name": "ElKuKu\\Crowdin\\Package", "doc": "Namespace ElKuKu\\Crowdin\\Package"},
            
            {"type": "Class", "fromName": "ElKuKu\\Crowdin", "fromLink": "ElKuKu/Crowdin.html", "link": "ElKuKu/Crowdin/Crowdin.html", "name": "ElKuKu\\Crowdin\\Crowdin", "doc": "&quot;Class for interacting with Crowdin.&quot;"},
                                                        {"type": "Method", "fromName": "ElKuKu\\Crowdin\\Crowdin", "fromLink": "ElKuKu/Crowdin/Crowdin.html", "link": "ElKuKu/Crowdin/Crowdin.html#method___construct", "name": "ElKuKu\\Crowdin\\Crowdin::__construct", "doc": "&quot;Constructor.&quot;"},
                    {"type": "Method", "fromName": "ElKuKu\\Crowdin\\Crowdin", "fromLink": "ElKuKu/Crowdin/Crowdin.html", "link": "ElKuKu/Crowdin/Crowdin.html#method___get", "name": "ElKuKu\\Crowdin\\Crowdin::__get", "doc": "&quot;Magic method to lazily create API objects.&quot;"},
            
            {"type": "Class", "fromName": "ElKuKu\\Crowdin", "fromLink": "ElKuKu/Crowdin.html", "link": "ElKuKu/Crowdin/Languagefile.html", "name": "ElKuKu\\Crowdin\\Languagefile", "doc": "&quot;Language file class.&quot;"},
                                                        {"type": "Method", "fromName": "ElKuKu\\Crowdin\\Languagefile", "fromLink": "ElKuKu/Crowdin/Languagefile.html", "link": "ElKuKu/Crowdin/Languagefile.html#method___construct", "name": "ElKuKu\\Crowdin\\Languagefile::__construct", "doc": "&quot;Constructor.&quot;"},
                    {"type": "Method", "fromName": "ElKuKu\\Crowdin\\Languagefile", "fromLink": "ElKuKu/Crowdin/Languagefile.html", "link": "ElKuKu/Crowdin/Languagefile.html#method_getLocalPath", "name": "ElKuKu\\Crowdin\\Languagefile::getLocalPath", "doc": "&quot;Get the local path.&quot;"},
                    {"type": "Method", "fromName": "ElKuKu\\Crowdin\\Languagefile", "fromLink": "ElKuKu/Crowdin/Languagefile.html", "link": "ElKuKu/Crowdin/Languagefile.html#method_getCrowdinPath", "name": "ElKuKu\\Crowdin\\Languagefile::getCrowdinPath", "doc": "&quot;Get the Crowdin path.&quot;"},
                    {"type": "Method", "fromName": "ElKuKu\\Crowdin\\Languagefile", "fromLink": "ElKuKu/Crowdin/Languagefile.html", "link": "ElKuKu/Crowdin/Languagefile.html#method_setExportPattern", "name": "ElKuKu\\Crowdin\\Languagefile::setExportPattern", "doc": "&quot;Set the export pattern.&quot;"},
                    {"type": "Method", "fromName": "ElKuKu\\Crowdin\\Languagefile", "fromLink": "ElKuKu/Crowdin/Languagefile.html", "link": "ElKuKu/Crowdin/Languagefile.html#method_getExportPattern", "name": "ElKuKu\\Crowdin\\Languagefile::getExportPattern", "doc": "&quot;Get the export pattern.&quot;"},
                    {"type": "Method", "fromName": "ElKuKu\\Crowdin\\Languagefile", "fromLink": "ElKuKu/Crowdin/Languagefile.html", "link": "ElKuKu/Crowdin/Languagefile.html#method_setTitle", "name": "ElKuKu\\Crowdin\\Languagefile::setTitle", "doc": "&quot;Set the title.&quot;"},
                    {"type": "Method", "fromName": "ElKuKu\\Crowdin\\Languagefile", "fromLink": "ElKuKu/Crowdin/Languagefile.html", "link": "ElKuKu/Crowdin/Languagefile.html#method_getTitle", "name": "ElKuKu\\Crowdin\\Languagefile::getTitle", "doc": "&quot;Get the title.&quot;"},
            
            {"type": "Class", "fromName": "ElKuKu\\Crowdin", "fromLink": "ElKuKu/Crowdin.html", "link": "ElKuKu/Crowdin/Languageproject.html", "name": "ElKuKu\\Crowdin\\Languageproject", "doc": "&quot;Project class.&quot;"},
                                                        {"type": "Method", "fromName": "ElKuKu\\Crowdin\\Languageproject", "fromLink": "ElKuKu/Crowdin/Languageproject.html", "link": "ElKuKu/Crowdin/Languageproject.html#method_toQuery", "name": "ElKuKu\\Crowdin\\Languageproject::toQuery", "doc": "&quot;Convert tye object to query string.&quot;"},
            
            {"type": "Class", "fromName": "ElKuKu\\Crowdin", "fromLink": "ElKuKu/Crowdin.html", "link": "ElKuKu/Crowdin/Package.html", "name": "ElKuKu\\Crowdin\\Package", "doc": "&quot;Class Package&quot;"},
                                                        {"type": "Method", "fromName": "ElKuKu\\Crowdin\\Package", "fromLink": "ElKuKu/Crowdin/Package.html", "link": "ElKuKu/Crowdin/Package.html#method___construct", "name": "ElKuKu\\Crowdin\\Package::__construct", "doc": "&quot;Constructor.&quot;"},
                    {"type": "Method", "fromName": "ElKuKu\\Crowdin\\Package", "fromLink": "ElKuKu/Crowdin/Package.html", "link": "ElKuKu/Crowdin/Package.html#method_getProjectId", "name": "ElKuKu\\Crowdin\\Package::getProjectId", "doc": "&quot;Get the project ID.&quot;"},
                    {"type": "Method", "fromName": "ElKuKu\\Crowdin\\Package", "fromLink": "ElKuKu/Crowdin/Package.html", "link": "ElKuKu/Crowdin/Package.html#method_getApiKey", "name": "ElKuKu\\Crowdin\\Package::getApiKey", "doc": "&quot;Get the API key.&quot;"},
                    {"type": "Method", "fromName": "ElKuKu\\Crowdin\\Package", "fromLink": "ElKuKu/Crowdin/Package.html", "link": "ElKuKu/Crowdin/Package.html#method_getHttpClient", "name": "ElKuKu\\Crowdin\\Package::getHttpClient", "doc": "&quot;Get the HTTP client object.&quot;"},
                    {"type": "Method", "fromName": "ElKuKu\\Crowdin\\Package", "fromLink": "ElKuKu/Crowdin/Package.html", "link": "ElKuKu/Crowdin/Package.html#method_getBasePath", "name": "ElKuKu\\Crowdin\\Package::getBasePath", "doc": "&quot;Get the base path for the command including an action.&quot;"},
            
            {"type": "Class", "fromName": "ElKuKu\\Crowdin\\Package", "fromLink": "ElKuKu/Crowdin/Package.html", "link": "ElKuKu/Crowdin/Package/Directory.html", "name": "ElKuKu\\Crowdin\\Package\\Directory", "doc": "&quot;Class Directory&quot;"},
                                                        {"type": "Method", "fromName": "ElKuKu\\Crowdin\\Package\\Directory", "fromLink": "ElKuKu/Crowdin/Package/Directory.html", "link": "ElKuKu/Crowdin/Package/Directory.html#method_add", "name": "ElKuKu\\Crowdin\\Package\\Directory::add", "doc": "&quot;Add directory to Crowdin project.&quot;"},
                    {"type": "Method", "fromName": "ElKuKu\\Crowdin\\Package\\Directory", "fromLink": "ElKuKu/Crowdin/Package/Directory.html", "link": "ElKuKu/Crowdin/Package/Directory.html#method_update", "name": "ElKuKu\\Crowdin\\Package\\Directory::update", "doc": "&quot;Rename directory or modify its attributes.&quot;"},
                    {"type": "Method", "fromName": "ElKuKu\\Crowdin\\Package\\Directory", "fromLink": "ElKuKu/Crowdin/Package/Directory.html", "link": "ElKuKu/Crowdin/Package/Directory.html#method_delete", "name": "ElKuKu\\Crowdin\\Package\\Directory::delete", "doc": "&quot;Delete Crowdin project directory.&quot;"},
            
            {"type": "Class", "fromName": "ElKuKu\\Crowdin\\Package", "fromLink": "ElKuKu/Crowdin/Package.html", "link": "ElKuKu/Crowdin/Package/File.html", "name": "ElKuKu\\Crowdin\\Package\\File", "doc": "&quot;Class File&quot;"},
                                                        {"type": "Method", "fromName": "ElKuKu\\Crowdin\\Package\\File", "fromLink": "ElKuKu/Crowdin/Package/File.html", "link": "ElKuKu/Crowdin/Package/File.html#method_add", "name": "ElKuKu\\Crowdin\\Package\\File::add", "doc": "&quot;Add new file to Crowdin project.&quot;"},
                    {"type": "Method", "fromName": "ElKuKu\\Crowdin\\Package\\File", "fromLink": "ElKuKu/Crowdin/Package/File.html", "link": "ElKuKu/Crowdin/Package/File.html#method_update", "name": "ElKuKu\\Crowdin\\Package\\File::update", "doc": "&quot;Upload latest version of your localization file to Crowdin.&quot;"},
                    {"type": "Method", "fromName": "ElKuKu\\Crowdin\\Package\\File", "fromLink": "ElKuKu/Crowdin/Package/File.html", "link": "ElKuKu/Crowdin/Package/File.html#method_delete", "name": "ElKuKu\\Crowdin\\Package\\File::delete", "doc": "&quot;Delete file from Crowdin project. All the translations will be lost without ability to restore them.&quot;"},
                    {"type": "Method", "fromName": "ElKuKu\\Crowdin\\Package\\File", "fromLink": "ElKuKu/Crowdin/Package/File.html", "link": "ElKuKu/Crowdin/Package/File.html#method_export", "name": "ElKuKu\\Crowdin\\Package\\File::export", "doc": "&quot;This method exports single translated files from Crowdin.&quot;"},
            
            {"type": "Class", "fromName": "ElKuKu\\Crowdin\\Package", "fromLink": "ElKuKu/Crowdin/Package.html", "link": "ElKuKu/Crowdin/Package/Glossary.html", "name": "ElKuKu\\Crowdin\\Package\\Glossary", "doc": "&quot;Class Glossary&quot;"},
                                                        {"type": "Method", "fromName": "ElKuKu\\Crowdin\\Package\\Glossary", "fromLink": "ElKuKu/Crowdin/Package/Glossary.html", "link": "ElKuKu/Crowdin/Package/Glossary.html#method_download", "name": "ElKuKu\\Crowdin\\Package\\Glossary::download", "doc": "&quot;Download Crowdin project glossaries as TBX file.&quot;"},
                    {"type": "Method", "fromName": "ElKuKu\\Crowdin\\Package\\Glossary", "fromLink": "ElKuKu/Crowdin/Package/Glossary.html", "link": "ElKuKu/Crowdin/Package/Glossary.html#method_upload", "name": "ElKuKu\\Crowdin\\Package\\Glossary::upload", "doc": "&quot;Upload your Translation Memory for Crowdin Project in TMX file format.&quot;"},
            
            {"type": "Class", "fromName": "ElKuKu\\Crowdin\\Package", "fromLink": "ElKuKu/Crowdin/Package.html", "link": "ElKuKu/Crowdin/Package/Language.html", "name": "ElKuKu\\Crowdin\\Package\\Language", "doc": "&quot;Class Language&quot;"},
                                                        {"type": "Method", "fromName": "ElKuKu\\Crowdin\\Package\\Language", "fromLink": "ElKuKu/Crowdin/Package/Language.html", "link": "ElKuKu/Crowdin/Package/Language.html#method_getSupported", "name": "ElKuKu\\Crowdin\\Package\\Language::getSupported", "doc": "&quot;Get supported languages list with Crowdin codes mapped to locale name and standardized codes.&quot;"},
                    {"type": "Method", "fromName": "ElKuKu\\Crowdin\\Package\\Language", "fromLink": "ElKuKu/Crowdin/Package/Language.html", "link": "ElKuKu/Crowdin/Package/Language.html#method_getStatus", "name": "ElKuKu\\Crowdin\\Package\\Language::getStatus", "doc": "&quot;Get the detailed translation progress for specified language.&quot;"},
            
            {"type": "Class", "fromName": "ElKuKu\\Crowdin\\Package", "fromLink": "ElKuKu/Crowdin/Package.html", "link": "ElKuKu/Crowdin/Package/Memory.html", "name": "ElKuKu\\Crowdin\\Package\\Memory", "doc": "&quot;Class Memory&quot;"},
                                                        {"type": "Method", "fromName": "ElKuKu\\Crowdin\\Package\\Memory", "fromLink": "ElKuKu/Crowdin/Package/Memory.html", "link": "ElKuKu/Crowdin/Package/Memory.html#method_download", "name": "ElKuKu\\Crowdin\\Package\\Memory::download", "doc": "&quot;Download Crowdin project Translation Memory as TMX file.&quot;"},
                    {"type": "Method", "fromName": "ElKuKu\\Crowdin\\Package\\Memory", "fromLink": "ElKuKu/Crowdin/Package/Memory.html", "link": "ElKuKu/Crowdin/Package/Memory.html#method_upload", "name": "ElKuKu\\Crowdin\\Package\\Memory::upload", "doc": "&quot;Upload your Translation Memory for Crowdin Project in TMX file format.&quot;"},
            
            {"type": "Class", "fromName": "ElKuKu\\Crowdin\\Package", "fromLink": "ElKuKu/Crowdin/Package.html", "link": "ElKuKu/Crowdin/Package/Project.html", "name": "ElKuKu\\Crowdin\\Package\\Project", "doc": "&quot;Class Project&quot;"},
                                                        {"type": "Method", "fromName": "ElKuKu\\Crowdin\\Package\\Project", "fromLink": "ElKuKu/Crowdin/Package/Project.html", "link": "ElKuKu/Crowdin/Package/Project.html#method_create", "name": "ElKuKu\\Crowdin\\Package\\Project::create", "doc": "&quot;Create Crowdin project.&quot;"},
                    {"type": "Method", "fromName": "ElKuKu\\Crowdin\\Package\\Project", "fromLink": "ElKuKu/Crowdin/Package/Project.html", "link": "ElKuKu/Crowdin/Package/Project.html#method_edit", "name": "ElKuKu\\Crowdin\\Package\\Project::edit", "doc": "&quot;Edit Crowdin project.&quot;"},
                    {"type": "Method", "fromName": "ElKuKu\\Crowdin\\Package\\Project", "fromLink": "ElKuKu/Crowdin/Package/Project.html", "link": "ElKuKu/Crowdin/Package/Project.html#method_getList", "name": "ElKuKu\\Crowdin\\Package\\Project::getList", "doc": "&quot;Get Crowdin Project details.&quot;"},
                    {"type": "Method", "fromName": "ElKuKu\\Crowdin\\Package\\Project", "fromLink": "ElKuKu/Crowdin/Package/Project.html", "link": "ElKuKu/Crowdin/Package/Project.html#method_getInfo", "name": "ElKuKu\\Crowdin\\Package\\Project::getInfo", "doc": "&quot;Get Crowdin Project details.&quot;"},
                    {"type": "Method", "fromName": "ElKuKu\\Crowdin\\Package\\Project", "fromLink": "ElKuKu/Crowdin/Package/Project.html", "link": "ElKuKu/Crowdin/Package/Project.html#method_delete", "name": "ElKuKu\\Crowdin\\Package\\Project::delete", "doc": "&quot;Delete Crowdin project with all translations.&quot;"},
            
            {"type": "Class", "fromName": "ElKuKu\\Crowdin\\Package", "fromLink": "ElKuKu/Crowdin/Package.html", "link": "ElKuKu/Crowdin/Package/Translation.html", "name": "ElKuKu\\Crowdin\\Package\\Translation", "doc": "&quot;Class Translation&quot;"},
                                                        {"type": "Method", "fromName": "ElKuKu\\Crowdin\\Package\\Translation", "fromLink": "ElKuKu/Crowdin/Package/Translation.html", "link": "ElKuKu/Crowdin/Package/Translation.html#method_upload", "name": "ElKuKu\\Crowdin\\Package\\Translation::upload", "doc": "&quot;Upload existing translations to your Crowdin project.&quot;"},
                    {"type": "Method", "fromName": "ElKuKu\\Crowdin\\Package\\Translation", "fromLink": "ElKuKu/Crowdin/Package/Translation.html", "link": "ElKuKu/Crowdin/Package/Translation.html#method_export", "name": "ElKuKu\\Crowdin\\Package\\Translation::export", "doc": "&quot;Build ZIP archive with the latest translations. Please note that this method can be invoked\nonly once per 30 minutes (there is no such restriction for organization plans). Also API\ncall will be ignored if there were no changes in the project since previous export. You can\nsee whether ZIP archive with latest translations was actually build by status attribute\n(\&quot;built\&quot; or \&quot;skipped\&quot;) returned in response.&quot;"},
                    {"type": "Method", "fromName": "ElKuKu\\Crowdin\\Package\\Translation", "fromLink": "ElKuKu/Crowdin/Package/Translation.html", "link": "ElKuKu/Crowdin/Package/Translation.html#method_download", "name": "ElKuKu\\Crowdin\\Package\\Translation::download", "doc": "&quot;Download ZIP file with translations. You can choose the language of translation\nyou need or download all of them at once.&quot;"},
                    {"type": "Method", "fromName": "ElKuKu\\Crowdin\\Package\\Translation", "fromLink": "ElKuKu/Crowdin/Package/Translation.html", "link": "ElKuKu/Crowdin/Package/Translation.html#method_getStatus", "name": "ElKuKu\\Crowdin\\Package\\Translation::getStatus", "doc": "&quot;Track overall translation and proofreading progresses of each target language.&quot;"},
            
            
                                        // Fix trailing commas in the index
        {}
    ];

    /** Tokenizes strings by namespaces and functions */
    function tokenizer(term) {
        if (!term) {
            return [];
        }

        var tokens = [term];
        var meth = term.indexOf('::');

        // Split tokens into methods if "::" is found.
        if (meth > -1) {
            tokens.push(term.substr(meth + 2));
            term = term.substr(0, meth - 2);
        }

        // Split by namespace or fake namespace.
        if (term.indexOf('\\') > -1) {
            tokens = tokens.concat(term.split('\\'));
        } else if (term.indexOf('_') > 0) {
            tokens = tokens.concat(term.split('_'));
        }

        // Merge in splitting the string by case and return
        tokens = tokens.concat(term.match(/(([A-Z]?[^A-Z]*)|([a-z]?[^a-z]*))/g).slice(0,-1));

        return tokens;
    };

    root.Sami = {
        /**
         * Cleans the provided term. If no term is provided, then one is
         * grabbed from the query string "search" parameter.
         */
        cleanSearchTerm: function(term) {
            // Grab from the query string
            if (typeof term === 'undefined') {
                var name = 'search';
                var regex = new RegExp("[\\?&]" + name + "=([^&#]*)");
                var results = regex.exec(location.search);
                if (results === null) {
                    return null;
                }
                term = decodeURIComponent(results[1].replace(/\+/g, " "));
            }

            return term.replace(/<(?:.|\n)*?>/gm, '');
        },

        /** Searches through the index for a given term */
        search: function(term) {
            // Create a new search index if needed
            if (!bhIndex) {
                bhIndex = new Bloodhound({
                    limit: 500,
                    local: searchIndex,
                    datumTokenizer: function (d) {
                        return tokenizer(d.name);
                    },
                    queryTokenizer: Bloodhound.tokenizers.whitespace
                });
                bhIndex.initialize();
            }

            results = [];
            bhIndex.get(term, function(matches) {
                results = matches;
            });

            if (!rootPath) {
                return results;
            }

            // Fix the element links based on the current page depth.
            return $.map(results, function(ele) {
                if (ele.link.indexOf('..') > -1) {
                    return ele;
                }
                ele.link = rootPath + ele.link;
                if (ele.fromLink) {
                    ele.fromLink = rootPath + ele.fromLink;
                }
                return ele;
            });
        },

        /** Get a search class for a specific type */
        getSearchClass: function(type) {
            return searchTypeClasses[type] || searchTypeClasses['_'];
        },

        /** Add the left-nav tree to the site */
        injectApiTree: function(ele) {
            ele.html(treeHtml);
        }
    };

    $(function() {
        // Modify the HTML to work correctly based on the current depth
        rootPath = $('body').attr('data-root-path');
        treeHtml = treeHtml.replace(/href="/g, 'href="' + rootPath);
        Sami.injectApiTree($('#api-tree'));
    });

    return root.Sami;
})(window);

$(function() {

    // Enable the version switcher
    $('#version-switcher').change(function() {
        window.location = $(this).val()
    });

    
        // Toggle left-nav divs on click
        $('#api-tree .hd span').click(function() {
            $(this).parent().parent().toggleClass('opened');
        });

        // Expand the parent namespaces of the current page.
        var expected = $('body').attr('data-name');

        if (expected) {
            // Open the currently selected node and its parents.
            var container = $('#api-tree');
            var node = $('#api-tree li[data-name="' + expected + '"]');
            // Node might not be found when simulating namespaces
            if (node.length > 0) {
                node.addClass('active').addClass('opened');
                node.parents('li').addClass('opened');
                var scrollPos = node.offset().top - container.offset().top + container.scrollTop();
                // Position the item nearer to the top of the screen.
                scrollPos -= 200;
                container.scrollTop(scrollPos);
            }
        }

    
    
        var form = $('#search-form .typeahead');
        form.typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        }, {
            name: 'search',
            displayKey: 'name',
            source: function (q, cb) {
                cb(Sami.search(q));
            }
        });

        // The selection is direct-linked when the user selects a suggestion.
        form.on('typeahead:selected', function(e, suggestion) {
            window.location = suggestion.link;
        });

        // The form is submitted when the user hits enter.
        form.keypress(function (e) {
            if (e.which == 13) {
                $('#search-form').submit();
                return true;
            }
        });

    
});


