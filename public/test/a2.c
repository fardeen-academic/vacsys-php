#include <stdio.h>
#include <stdlib.h>

struct node
{
    int key;
    struct node *left;
    struct node *right;
};

struct node *new_Node(int key)
{
    struct node *node = (struct node *)malloc(sizeof(struct node));
    node->key = key;
    node->left = NULL;
    node->right = NULL;
    return (node);
}

void add_Greater_Uti_DATAl(struct node *root, int *sum_ptr)
{
    // Base Case
    if (root == NULL)
        return;

    // Recur for right subtree first so that sum of all greater
    // nodes is stored at sum_ptr
    add_Greater_Uti_DATAl(root->right, sum_ptr);

    // Update the value at sum_ptr
    *sum_ptr = *sum_ptr + root->key;

    // Update key of this node
    root->key = *sum_ptr;

    // Recur for left subtree so that the updated sum is added
    // to smaller nodes
    add_Greater_Uti_DATAl(root->left, sum_ptr);
}

void add_Greater_DAta(struct node *root)
{
    int sum = 0;
    add_Greater_Uti_DATAl(root, &sum);
}

void display_Inorder(struct node *node)
{
    if (node == NULL)
        return;
    display_Inorder(node->left);
    printf("%d ", node->key);
    display_Inorder(node->right);
}

int main()
{

    node *root = new_Node(5);
    root->left = new_Node(2);
    root->right = new_Node(13);

    printf("Inorder traversal of the given tree\n");
    display_Inorder(root);

    add_Greater_DAta(root);

    printf("\nInorder traversal of the modified tree\n");
    display_Inorder(root);

    return 0;
}
