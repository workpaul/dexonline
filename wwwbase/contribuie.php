<?php
require_once("../phplib/util.php");
util_assertNotMirror();

$name = util_getRequestParameter('wordName');
$sourceId = util_getRequestParameter('source');
$def = util_getRequestParameter('def');
$sendButton = util_getRequestParameter('send');

if ($sendButton) {
  session_setSourceCookie($sourceId);

  $def = text_internalizeDefinition($def);

  $errorMessage = '';
  if (!$name) {
    $errorMessage = 'Trebuie să introduceți un cuvânt-titlu.';
  } else if (!$def) {
    $errorMessage = 'Trebuie să introduceți o definiție.';
  }

  if ($errorMessage) {
    smarty_assign('wordName', $name);
    smarty_assign('sourceId', $sourceId);
    smarty_assign('def', $def);
    session_setFlash($errorMessage);
    smarty_assign('previewDivContent', text_htmlize($def));
  } else {
    $definition = new Definition();
    $definition->userId = session_getUserId();
    $definition->sourceId = $sourceId;
    $definition->internalRep = $def;
    $definition->htmlRep = text_htmlize($def);
    $definition->lexicon = text_extractLexicon($definition);
    $definition->save();
    log_userLog("Added definition {$definition->id} ({$definition->lexicon})");

    $name = addslashes(text_formatLexem($name));
    $lexems = db_find(new Lexem(), "form = '{$name}'");
    if (!count($lexems)) {
      $lexems = db_find(new Lexem(), "formNoAccent = '{$name}'");
    }
    if (count($lexems)) {
      // Reuse existing lexem.
      $lexem = $lexems[0];
      log_userLog("Reusing lexem {$lexem->id} ({$lexem->form})");
    } else {
      // Create a new lexem.
      $lexem = new Lexem($name, 'T', '1', '');
      $lexem->save();
      $lexem->regenerateParadigm();
      log_userLog("Created lexem {$lexem->id} ({$lexem->form})");
    }

    LexemDefinitionMap::associate($lexem->id, $definition->id);
    session_setFlash('Definiția a fost trimisă. Un moderator o va examina în scurt timp. Vă mulțumim!', 'info');
    util_redirect('contribuie');
  }
} else {
  smarty_assign('sourceId', session_getDefaultContribSourceId());
}

smarty_assign('contribSources', db_find(new Source(), 'canContribute'));
smarty_assign('page_title', 'Contribuie cu definiții');
smarty_displayCommonPageWithSkin('contribuie.ihtml');

?>