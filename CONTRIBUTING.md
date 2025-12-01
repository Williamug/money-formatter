# Contributing to Money Formatter

Thank you for considering contributing to Money Formatter! We welcome contributions from the community.

## How to Contribute

### Reporting Bugs

If you find a bug, please create an issue on GitHub with:
- A clear, descriptive title
- Steps to reproduce the issue
- Expected vs actual behavior
- PHP version, Laravel version, and package version
- Any relevant code samples

### Suggesting Features

Feature requests are welcome! Please create an issue with:
- A clear description of the feature
- Use cases and examples
- Any relevant implementation details

### Pull Requests

1. **Fork the repository** and create your branch from `main`
2. **Make your changes** with clear, concise commits
3. **Add tests** for any new functionality
4. **Ensure all tests pass** by running `composer test`
5. **Update documentation** if needed (README.md, code comments)
6. **Submit a pull request** with a clear description

### Development Setup

```bash
# Clone your fork
git clone https://github.com/your-username/money-formatter.git
cd money-formatter

# Install dependencies
composer install

# Run tests
composer test

# Run code style fixes
./vendor/bin/php-cs-fixer fix
```

### Coding Standards

- Follow PSR-12 coding standards
- Write clear, descriptive commit messages
- Add type hints and return types
- Document new public methods with PHPDoc
- Keep methods focused and concise

### Testing

- Write tests for all new features
- Ensure existing tests pass
- Aim for high code coverage
- Test edge cases and error conditions

### Code Style

The project uses PHP CS Fixer. Run it before submitting:

```bash
./vendor/bin/php-cs-fixer fix
```

## Code of Conduct

- Be respectful and inclusive
- Welcome newcomers and help them get started
- Focus on constructive feedback
- Assume good intentions

## Questions?

Feel free to open an issue for any questions about contributing.

Thank you for contributing! 🎉
