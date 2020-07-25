require_once( "$IP/extensions/Wikibase/Wikibase.php" );
wfLoadExtension( 'WikibaseQuality' );
wfLoadExtension( 'WikibaseQualityConstraints' );
wfLoadExtension( 'WikiEditor' );
wfLoadExtension( 'WikimediaBadges' );
wfLoadExtension( 'Flow' );

$wgWikimediaJenkinsCI = false;

wfLoadSkin( 'Timeless' );
wfLoadSkin( 'MonoBook' );
wfLoadSkin( 'Vector' );

wfLoadExtension( 'ParserFunctions' );
wfLoadExtension( 'MobileFrontend' );
$wgMFAutodetectMobileView = true;

wfLoadExtension( 'Cite' );

wfLoadExtension( 'Scribunto' );
$wgScribuntoDefaultEngine = 'luastandalone';

wfLoadExtension( 'TemplateData' );