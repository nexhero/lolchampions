<?php

/**
 * @file
 * Default theme implementation to display a term.
 *
 * Available variables:
 * - $name: (deprecated) The unsanitized name of the term. Use $term_name
 *   instead.
 * - $content: An array of items for the content of the term (fields and
 *   description). Use render($content) to print them all, or print a subset
 *   such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $term_url: Direct URL of the current term.
 * - $term_name: Name of the current term.
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the following:
 *   - taxonomy-term: The current template type, i.e., "theming hook".
 *   - vocabulary-[vocabulary-name]: The vocabulary to which the term belongs to.
 *     For example, if the term is a "Tag" it would result in "vocabulary-tag".
 *
 * Other variables:
 * - $term: Full term object. Contains data that may not be safe.
 * - $view_mode: View mode, e.g. 'full', 'teaser'...
 * - $page: Flag for the full page state.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the term. Increments each time it's output.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * @see template_preprocess()
 * @see template_preprocess_taxonomy_term()
 * @see template_process()
 *
 * @ingroup themeable
 */
?>
  <?php
    $library = libraries_load('phpriotapi');
    $riotapi = new riotapi(variable_get('lolserver', 'lan'));
    $r = $riotapi->getChampionId($term->champion_id['und'][0]['value'],'?champData=all');

    $skins=$r['skins'];
    $lore=$r['lore'];
    $stats=$r['stats'];
    $blurb=$r['blurb'];
    $allytips=$r['allytips'];
    $enemytips=$r['enemytips'];
    $tags=$r['tags'];
    $partype=$r['partype'];
    $info=$r['info'];
    $spells=$r['spells'];
    $passive=$r['passive'];

  ?>

<div id="taxonomy-term-<?php print $term->tid; ?>" class="<?php print $classes; ?>">
  <?php if (!$page): ?>
    <h2><a href="<?php print $term_url; ?>"><?php print $term_name; ?></a></h2>
  <?php endif; ?>

  <div class="content">
  <h2><?php print $r['title']; ?></h2>
  <div>
  <h3>
  <?php print(t('Champion Stats')) ?>
  </h3><br/>
  <table>
    <tbody>
      <tr>
        <td>
          <?php print(t('armor/armorperlevel')) ?>
        </td>
        <td>
          <?php print $stats['armor'] . "/". $stats['armorperlevel'] ?>
        </td>
        <td>
          <?php print(t('attackdamage/attackdamageperlevel')) ?>
        </td>
        </td>
        <td>
          <?php print $stats['attackdamage'] . "/". $stats['attackdamageperlevel'] ?>
        </td>
      </tr>
      <tr>
        <td>
          <?php print(t('hp/hpperlevel')) ?>
        </td>
        <td>
          <?php print $stats['hp'] . "/". $stats['hpperlevel'] ?>
        </td>
        <td>
          <?php print(t('hpregen/hpregenperlevel')) ?>
        </td>
        </td>
        <td>
          <?php print $stats['hpregen'] . "/". $stats['hpregenperlevel'] ?>
        </td>
      </tr>
      <tr>
        <td>
          <?php print(t('mp/mpperlevel')) ?>
        </td>
        <td>
          <?php print $stats['mp'] . "/". $stats['mpperlevel'] ?>
        </td>
        <td>
          <?php print(t('mpregen/mpregenperlevel')) ?>
        </td>
        </td>
        <td>
          <?php print $stats['mpregen'] . "/". $stats['mpregenperlevel'] ?>
        </td>
      </tr>
    </tbody>
  </table><br/>
  <h2>
</div>
  <?php
  $i=0;
    foreach ($r['skins'] as $key => $value) {
      echo '<img src="http://ddragon.leagueoflegends.com/cdn/img/champion/loading/'.$r['key'].'_'.$i.'.jpg" alt="" width="175" height="318">';
      $i++;
    }
  ?>

  <p><?php print $r['lore']; ?></p>
  </div>

</div>
