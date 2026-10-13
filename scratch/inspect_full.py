import requests
import re
from bs4 import BeautifulSoup

resp = requests.get('https://ditstudio.com.bd/', headers={'User-Agent': 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_0 like Mac OS X)'})
html = resp.text
soup = BeautifulSoup(html, 'html.parser')

print("=== ALL IMAGES IN PAGE ===")
all_imgs = []
for img in soup.find_all('img'):
    src = img.get('src') or img.get('data-src')
    if src:
        all_imgs.append(src)
print("Total <img> tags:", len(all_imgs))

bg_imgs = re.findall(r'url\((?:[\'"]?)(https?://ditstudio\.com\.bd/wp-content/uploads/[^\'")]+)(?:[\'"]?)\)', html)
print("Total CSS background images:", len(bg_imgs))

# Find the slide backgrounds specifically
slide_divs = soup.find_all('div', class_=lambda c: c and any(k in str(c) for k in ['slide', 'swiper', 'carousel', 'elementor-section']))
for div in slide_divs:
    st = div.get('style', '')
    if 'background' in st:
        print("Slide style:", st)

# Print all unique image URLs from page
all_found = list(set(all_imgs + bg_imgs))
with open('scratch/all_dit_images.txt', 'w', encoding='utf-8') as f:
    for u in all_found:
        f.write(u + '\n')

print(f"Saved {len(all_found)} unique images to scratch/all_dit_images.txt")
