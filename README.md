*Web-programozás II előadás – beadandó feladat (Laravel)*

---

🎯 **Oldal:** http://b223va.nhely.hu

📚 **Adatbázis:** 1-05-Napló-3 táblás

🎨 **Téma:** [Joson](https://themewagon.com/themes/free-bootstrap-4-html-5-education-website-template-joson/)

👥 **Készítették:**
- Mata László Dominik ([matadominik](https://github.com/matadominik)) – B223VA
- Fazekas Bence ([Bencuska0812](https://github.com/Bencuska0812)) – ZK6FMO

---

## Calculation Lab – Test Menu

The public Test Menu provides a four-operation calculator (addition, subtraction, multiplication and division) with server-side validation. The calculation logic is separated into `App\\Services\\CalculatorService`, making it independently unit-testable.

- Unit tests: `tests/Unit/CalculatorServiceTest.php`
- Feature tests: `tests/Feature/CalculatorFeatureTest.php`
- Route: `/test-menu`
- Operations: add, subtract, multiply, divide
- Validation: required numeric inputs, supported operation, division-by-zero handling

Run the test suite after installing dependencies:

```bash
php artisan test
```
