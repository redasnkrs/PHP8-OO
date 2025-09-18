<?php

class ArticleMapping
{
  // propriteté
  protected ?int $id = null;
  protected ?string $article_title = null;
  protected ?string $article_slug = null;
  protected ?string $article_text = null;
  protected ?string $article_date = null;
  protected null|bool|int $article_visibility = null;

  // Méthodes

  // Constructeur
  public function __construct(
    ?int $id,
    ?string $title,
    ?string $slug,
    ?string $text,
    ?string $date,
    null|bool|int $visibility,
  ) {
    $this->setId($id);
    $this->setArticleTitle($title);
    $this->setArticleSlug($slug);
    $this->setArticleDate($date);
    $this->setArticleText($text);
    $this->setArticleVisibility($visibility);
  }

  public function getId(): int
  {
    return $this->id;
  }

  // setter|getters

  public function setId(?int $id): void
  {
    if (is_null($id)) {
      return;
    }
    if ($id <= 0) {
      throw new Exception("Id doit être positif.");
    }
    $this->id = $id;
  }

  public function getArticleTitle(): string
  {
    return $this->article_title;
  }

  public function setArticleTitle(?string $title): void
  {
    if (is_null($title)) {
      $traitedTitle = trim(htmlspecialchars(strip_tags($title)));
      return;
    }
    if (empty($traitedTitle)) {
      throw new Exception("Le titre de l'article ne doit pas être vide.");
    }
    if (strlen($traitedTitle) < 6) {
      throw new Exception("Le titre de l'artcle est trop court.");
    }
    if (strlen($traitedTitle) > 120) {
      throw new Exception("Le titre de l'article est trop long.");
    }
  }
  public function getArticleSlug(): string
  {
    return $this->article_slug;
  }

  public function setArticleSlug(?string $slug): void
  {
    if (is_null($slug)) {
      $traitedSlug = trim(htmlspecialchars(strip_tags($slug)));
    }
    if (empty($traitedSlug)) {
      throw new Exception("Le slug de l'article ne doit pas être vide.");
    }
    if (strlen($traitedSlug) < 6) {
      throw new Exception("Le slug de l'artcle est trop court.");
    }
    if (strlen($traitedSlug) > 120) {
      throw new Exception("Le slug de l'article est trop long.");
    }
  }

  public function getArticleText(): string
  {
    return $this->article_text;
  }

  public function setArticleText(?string $text): void
  {
    if (is_null($text)) {
      $traitedText = trim(htmlspecialchars(strip_tags($text)));
    }
    if (empty($traitedText)) {
      throw new Exception("Le titre de l'article ne doit pas être vide.");
    }
    if (strlen($traitedText) < 20) {
      throw new Exception("Le text doit contenir 20 caractères minimum.");
    }
  }

  public function getArticleDate(): string
  {
    return $this->article_date;
  }

  public function setArticleDate(?string $date, string $format = "Y-m-d"): void
  {
    if (is_null($date)) {
      throw new Exception("La date ne peut être vide.");
    }

    // transforme un string dans un format de date
    $d = DateTime::createFromFormat($format, $date);
    if ($d && $d->format($format) === $date) {
      return;
    }
  }

  public function getArticleVisibility(): null|bool|int
  {
    return $this->article_visibility;
  }

  public function setArticleVisibility(null|bool|int $visibility): void
  {
    if (!is_bool($visibility) || ($visibility !== 0 && $visibility !== 1)) {
      throw new Exception(
        "La valeur doit être de type bool ou être égal a 0 | 1",
      );
    }
    $this->article_visibility = $visibility;
  }
}
