#include <stdio.h>
#include <stdlib.h>
struct node
{
    int key;
    struct node *left, *right;
};
struct node *newNode(int item)
{
    struct node *temp = (struct node *)malloc(sizeof(struct node));
    temp->key = item;
    temp->left = temp->right = NULL;
    return temp;
}
struct node *insert(struct node *node, int key)
{
    if (node == NULL)
        return newNode(key);
    if (key < node->key)
        node->left = insert(node->left, key);
    else if (key > node->key)
        node->right = insert(node->right, key);
    return node;
}
int findMaxforN(struct node *root, int N)
{
    if (root == NULL)
        return -1;
    if (root->key == N)
        return N;
    else if (root->key < N)
    {
        int k = findMaxforN(root->right, N);
        if (k == -1)
            return root->key;
        else
            return k;
    }
    else if (root->key > N)
        return findMaxforN(root->left, N);
}
int findMin(struct node *root)
{
    struct node *curr = root;
    while (curr->left != NULL)
    {
        curr = curr->left;
    }
    return curr->key;
}
int main()
{
    struct node *root = NULL;
    root = insert(root, 2);
    insert(root, 1);
    insert(root, 3);
    insert(root, 12);
    insert(root, 9);
    insert(root, 21);
    insert(root, 19);
    insert(root, 25);
    printf("Largest element smaller than or equal to %d in BST is %d", 24,
           findMaxforN(root, 24));
    printf("\nMinimum element in given BST is :%d", findMin(root));
    return 0;
}