# ☕ BrewDesk – POS Landing Page

A clean, focused landing page for **BrewDesk**, a Point-of-Sale system built specifically for coffee shops and independent cafés. Built with PHP, HTML, CSS, and vanilla JavaScript.

> SPM Assignment #04 | Team: Nayab Maryam (PM) & Tooba Nadeem (Tech Lead)

---

## Project Structure

```
quickpos/
├── index.php           Main landing page (all 6 sections)
├── thankyou.html       Redirect after form submission
├── css/
│   └── style.css       All styles (light cafe theme)
├── js/
│   └── main.js         Navbar scroll, form validation, reveal animations
├── php/
│   └── contact.php     Server-side PHP form handler
└── README.md
```

---

## Running Locally

**Option 1 – PHP built-in server**
```bash
cd quickpos
php -S localhost:8000
```
Open: http://localhost:8000

**Option 2 – XAMPP**
1. Place the `quickpos/` folder inside `htdocs/`
2. Start Apache from the XAMPP Control Panel
3. Open: http://localhost/quickpos/

---

## Branching Strategy (GitFlow)

| Branch | Purpose |
|--------|---------|
| `main` | Stable, deployed-ready code only |
| `develop` | Integration branch — all features merge here first |
| `feature/SCRUM-XX-description` | One branch per Jira ticket or Epic |
| `bugfix/SCRUM-XX-description` | Bug fixes linked to Jira tickets |

**Commit message format:** `[SCRUM-XX] Short description`

No direct commits to `main`. All work goes through Pull Requests reviewed by the Tech Lead.

---

## Known Bugs (intentional — for sprint QA workflow)

| File | Line | Bug |
|------|------|-----|
| `index.php` | ~22 | Nav "Contact" href is `#contac` instead of `#contact` |
| `index.php` | ~171 | `<textarea>` missing `required` attribute |
| `css/style.css` | feature card 4 | Missing hover transition (minor style bug) |
